<?php

namespace App\Http\Controllers;

use App\Events\ProjectCreatedEvent;
use App\Events\ProjectReviewedEvent;
use App\Http\Requests\ProjectDropRequest;
use App\Http\Requests\ProjectEndorseRequest;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\UploadAttachmentRequest;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\CovidIntervention;
use App\Models\FsInvestment;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\Office;
use App\Models\OperatingUnit;
use App\Models\OperatingUnitType;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PdpIndicator;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ReadinessLevel;
use App\Models\Region;
use App\Models\RegionInvestment;
use App\Models\Review;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\SubmissionStatus;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use App\Models\User;
use App\Notifications\ProjectDeletedNotification;
use Barryvdh\Snappy\Facades\SnappyPdf;
use File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Knp\Snappy\Pdf;

use Spatie\Searchable\Search;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Project::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $projectQuery = Project::query()->with(['office','creator.office','project_status','pipol']);

        if ($request->status) {
            $projectQuery->where('submission_status_id', SubmissionStatus::findByName($request->status)->id );
        }

        $projects = $this->filter($projectQuery, $request);

        return view('projects.index2', compact('projects'))
            ->with('submission_statuses', SubmissionStatus::withCount('projects')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $project = new Project;

        return view('projects.create', compact('project'))
            ->with([
                'pap_types'                 => PapType::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreRequest $request
     * @return Response
     * @throws \Exception
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

//        $project->bases()->sync($request->bases);
//        $project->regions()->sync($request->regions);
//        $project->funding_sources()->sync($request->funding_sources);
//        $project->sdgs()->sync($request->sdgs);
//        $project->pdp_chapters()->sync($request->pdp_chapters);
//        $project->pdp_indicators()->sync($request->pdp_indicators);
//        $project->ten_point_agendas()->sync($request->ten_point_agendas);
//        $project->operating_units()->sync($request->operating_units);
//        $project->covid_interventions()->sync($request->covid_interventions);
//
//        $project->fs_investments()->createMany($request->fs_investments);
//        $project->region_investments()->createMany($request->region_investments);
//
//        $project->project_update()->create([
//            'updates'   => $request->updates,
//            'updates_date' => $request->updates_date,
//        ]);
//        $project->expected_output()->create([
//            'expected_outputs' => $request->expected_outputs
//        ]);
//        $project->description()->create([
//            'description' => $request->description,
//        ]);
//
//        $project->feasibility_study()->create($request->feasibility_study);
//        $project->nep()->create($request->nep);
//        $project->allocation()->create($request->allocation);
//        $project->disbursement()->create($request->disbursement);
        $project->office_id = auth()->user()->office_id;
        $project->created_by = auth()->id();
        $project->save();

        event(new ProjectCreatedEvent($project));

        return redirect()->route('projects.show', $project)
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         => SpatialCoverage::all(),
                'regions'                   => Region::all(),
                'gads'                      => Gad::all(),
                'pip_typologies'            => PipTypology::all(),
                'cip_types'                 => CipType::all(),
                'years'                     => config('ipms.editor.years'),
                'approval_levels'           => ApprovalLevel::all(),
                'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
                'pdp_chapters'              => PdpChapter::orderBy('name')->get(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
                'pdp_indicators'            => PdpIndicator::with('children.children.children')
                    ->where('level',1)
                    ->select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      => ImplementationMode::all(),
                'tiers'                     => Tier::all(),
                'preparation_documents'     => PreparationDocument::all(),
                'fs_statuses'               => FsStatus::all(),
                'ou_types'                  => OperatingUnitType::with('operating_units')->get(),
                'covidInterventions'        => CovidIntervention::all(),
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function show(Project $project)
    {
        $project->load(
            'regions',
            'region_investments.region',
            'region_infrastructures.region',
            'fs_investments.funding_source',
            'fs_infrastructures.funding_source',
            'bases',
            'disbursement',
            'nep',
            'allocation',
            'feasibility_study',
            'right_of_way',
            'resettlement_action_plan',
            'ten_point_agendas',
            'sdgs',
            'pdp_chapters',
            'pdp_indicators',
            'operating_units');

        return view('projects.show', compact('project'))
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         => SpatialCoverage::all(),
                'regions'                   => Region::all(),
                'gads'                      => Gad::all(),
                'pip_typologies'            => PipTypology::all(),
                'cip_types'                 => CipType::all(),
                'years'                     => config('ipms.editor.years'),
                'approval_levels'           => ApprovalLevel::all(),
                'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
                'pdp_chapters'              => PdpChapter::orderBy('name')->get(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
                'pdp_indicators'            => PdpIndicator::with('children.children.children')
                    ->where('level',1)
                    ->select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      => ImplementationMode::all(),
                'tiers'                     => Tier::all(),
                'preparation_documents'     => PreparationDocument::all(),
                'fs_statuses'               => FsStatus::all(),
                'ou_types'                  => OperatingUnitType::with('operating_units')->get(),
                'covidInterventions'        => CovidIntervention::all(),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function edit(Project $project)
    {
        $project->load('bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','allocation','disbursement','nep','feasibility_study');

        return view('projects.edit', compact('project'))
            ->with([
                'offices'                   => Office::all(),
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         => SpatialCoverage::all(),
                'regions'                   => Region::all(),
                'gads'                      => Gad::all(),
                'pip_typologies'            => PipTypology::all(),
                'cip_types'                 => CipType::all(),
                'years'                     => config('ipms.editor.years'),
                'approval_levels'           => ApprovalLevel::all(),
                'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
                'pdp_chapters'              => PdpChapter::orderBy('name')->get(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
                'pdp_indicators'            => PdpIndicator::with('children.children.children')
                    ->where('level',1)
                    ->select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      => ImplementationMode::all(),
                'tiers'                     => Tier::all(),
                'preparation_documents'     => PreparationDocument::all(),
                'fs_statuses'               => FsStatus::all(),
                'ou_types'                  => OperatingUnitType::with('operating_units')->get(),
                'covidInterventions'        => CovidIntervention::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        if ($request->has('bases')) {
            $project->bases()->sync($request->bases);
        }
        if ($request->has('regions')) {
            $project->regions()->sync($request->regions);
        }
        if ($request->has('funding_sources')) {
            $project->regions()->sync($request->funding_sources);
        }
        if ($request->has('sdgs')) {
            $project->regions()->sync($request->sdgs);
        }
        if ($request->has('pdp_chapters')) {
            $project->regions()->sync($request->pdp_chapters);
        }
        if ($request->has('pdp_indicators')) {
            $project->regions()->sync($request->pdp_indicators);
        }
        if ($request->has('ten_point_agendas')) {
            $project->regions()->sync($request->ten_point_agendas);
        }
        if ($request->has('operating_units')) {
            $project->regions()->sync($request->operating_units);
        }
        if ($request->has('covid_interventions')) {
            $project->regions()->sync($request->covid_interventions);
        }
        if ($request->has('fs_investments')) {
            foreach ($request->fs_investments as $fs_investment) {
                $fsToEdit = FsInvestment::where('project_id', $project->id)->where('fs_id', $fs_investment['fs_id'])->first();
                $fsToEdit->update($fs_investment);
            }
        }
        if ($request->has('region_investments')) {
            foreach ($request->fs_investments as $fs_investment) {
                $fsToEdit = FsInvestment::where('project_id', $project->id)->where('fs_id', $fs_investment['fs_id'])->first();
                $fsToEdit->update($fs_investment);
            }
        }
        if ($request->has('updates') || $request->has('updates_date')) {
            $project->project_update()->update(
                [
                    'project_id' => $project->id,
                ],
                [
                'updates' => $request->updates,
                'updates_date' => $request->updates_date,
            ]);
        }
        if ($request->has('expected_outputs')) {
            $project->expected_output()->updateOrCreate([
                'project_id' => $project->id,
            ],[
                'expected_outputs' => $request->expected_outputs
            ]);
        }
        if ($request->has('description')) {
            $project->description()->updateOrCreate(
                [
                    'project_id' => $project->id,
                ],
                [
                    'description' => $request->description
                ]
            );
        }
        if ($request->has('feasibility_study')) {
            $project->feasibility_study()->update($request->feasibility_study);
        }
        if ($request->has('nep')) {
            $project->nep()->update($request->nep);
        }
        if ($request->has('allocation')) {
            $project->allocation()->update($request->allocation);
        }
        if ($request->has('disbursement')) {
            $project->disbursement()->update($request->disbursement);
        }

        if ($request->has('draft')) {
            $project->submission_status_id = SubmissionStatus::findByName('Draft')->id;
            $project->save();
        }

        if ($request->has('endorse')) {
            $this->authorize('endorse', $project);
            $project->submission_status_id = SubmissionStatus::findByName('Endorsed')->id;
            $project->save();
        }

        return back()
            ->with('success','Successfully updated project.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project, Request $request)
    {
        $projectArray = $project->toArray();
        $creator = $project->creator;

        if (config('ipms.force_delete')) {
            $project->forceDelete();
        } else {
            $project->delete();
        }

        if ($creator) {
            $creator->notify(new ProjectDeletedNotification($projectArray, auth()->user(), $request->reason));
        }

        Alert::success('Success', 'Successfully deleted project');

        return redirect()->route('projects.own');
    }

    public function review(Request $request, Project $project)
    {
        abort_if(!(auth()->user()->can('reviews.create') || auth()->user()->can('review', $project)), 403);

        return view('reviews.create', [
            'pageTitle' => 'Reviewing ' . $project->title,
            'project' => $project,
            'pip_typologies' => PipTypology::all(),
            'cip_types' => CipType::all(),
            'readiness_levels' => ReadinessLevel::all(),
        ]);
    }

    public function storeReview(ReviewStoreRequest $request, Project $project)
    {
        abort_if(!(auth()->user()->can('reviews.create') || auth()->user()->can('projects.review', $project)), 403);

        $review = Review::create($request->all());

        event(new ProjectReviewedEvent($review));

        Alert::success('Success', 'Review successfully saved');

        return redirect()->route('reviews.index')->with('message', 'Successfully added review');
    }

    public function upload(UploadAttachmentRequest $request, Project $project)
    {
        $attachment = $request->file('attachment');

        $fileName = $attachment->getClientOriginalName();

        if ($request->file('attachment')->storeAs('projects', $fileName)) {
            $project->attachments()->create([
                'title' => $fileName,
                'download_url' => 'projects/' . $fileName,
                'user_id' => auth()->id()
            ]);
            Alert::success('Success', 'Successfully uploaded file');
        }

        return back();
    }

    /**
     * Return user's own projects
     */
    public function own(Request $request)
    {
        abort_if(! auth()->user()->can('projects.view_own'), 403);

//        $projectQuery = Project::query()->own()->with(['office','creator.office','project_status','pipol']);
//
//        $projects = $this->filter($projectQuery, $request);

        return view('projects.own');
    }

    public function office(Request $request)
    {
        abort_if(! auth()->user()->can('projects.view_office'), 403);

//        $projectQuery = Project::query()->office()->with(['office','creator.office','project_status','pipol']);
//
//        $projects = $this->filter($projectQuery, $request);

        return view('projects.office');
    }

    public function filter($projectQuery, $request)
    {
        $projects = collect();

        if ($request->has('search')) {
            $query = $request->query();
            $searchTerm = '%' .  $query['search'] . '%' ?? '';
            $orderBy = $query['orderBy']  ?? 'id';
            $sortOrder = $query['sortOrder'] ?? 'ASC';

            if (! $searchTerm) {
                $projects = $projectQuery
                    ->orderBy($orderBy, $sortOrder)
                    ->paginate();
            } else {
                $projects = $projectQuery
                    ->where('title','like', $searchTerm)
//                    ->orWhereHas('project_status', function ($query) use ($searchTerm) {
//                        $query->where('name', 'like', $searchTerm);
//                    })
//                    ->orWhereHas('office', function ($query) use ($searchTerm) {
//                        $query->where('name','like', $searchTerm)
//                            ->orWhere('acronym','like', $searchTerm);
//                    })
//                    ->orWhereHas('creator', function ($query) use ($searchTerm) {
//                        $query->where('first_name','like', $searchTerm);
//                    })
                    ->orderBy($orderBy, $sortOrder)
                    ->paginate();
            }
        } else {
            $projects = $projectQuery->paginate();
        }

        return $projects;
    }

    public function assigned(Request $request)
    {
        abort_if(! auth()->user()->can('projects.view_assigned'), 403);

        return view('projects.assigned');
    }

    public function deleted(Request $request)
    {
        abort_if(! auth()->user()->can('projects.manage'), 403);

        return view('projects.deleted');
    }

    public function restore(string $uuid)
    {
        $project = Project::withTrashed()->where('uuid', $uuid)->firstOrFail();

        $project->restore();

        Alert::success('Success','Project successfully restored');

        return redirect()->route('projects.deleted');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->search;

        $searchResults = (new Search())
            ->registerModel(Project::class, 'title')
            ->search($searchTerm);

        if ($request->ajax()) {
            return response()->json($searchResults);
        }

        return $searchResults;
    }

    public function exportJson(Project $project)
    {
        $json = json_encode($project->load('creator','bases','regions','pdp_chapters','pdp_indicators','ten_point_agendas','funding_sources','region_investments.region','fs_investments.funding_source','allocation','disbursement','nep','feasibility_study','review'), JSON_PRETTY_PRINT);

        $file = Str::slug($project->title) . '.json';

        $destinationPath = \File::put(public_path($file), json_encode($json));

        return Storage::download(public_path($file));
    }

    public function drop(ProjectDropRequest $request, Project $project)
    {
        $project->reason_id             = $request->reason_id;
        $project->other_reason          = $request->other_reason;
        $project->submission_status_id  = SubmissionStatus::findByName(SubmissionStatus::DROPPED)->id;
        $project->save();

        Alert::success('Success','Project successfully dropped');

        return redirect()->route('projects.own');
    }

    public function validateProject(Request $request, Project $project)
    {
        // allow validation only if the project is endorsed
        if ($project->submission_status->name !== SubmissionStatus::ENDORSED) {
            return back();
        }

        $project->markAsValidated();

        return back();
    }

    public function audit_logs(Project $project)
    {
        return view('projects.history', compact('project'));
    }

    public function issues(Project $project)
    {
        return view('projects.issues', compact('project'));
    }

    public function settings(Project $project)
    {
        return view('projects.settings', compact('project'));
    }

    public function files(Project $project)
    {
        return view('projects.files', compact('project'));
    }

    public function checkAvailability(Request $request)
    {
        $title = $request->title;

        if ($title) {
            // check availability
            $existing = Project::where('title', strtolower($title))
                ->where('created_by', auth()->id())
                ->first();

            // if it is not existing, it is available
            if (! $existing) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Program/project title is available'
                ], 200);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Program/project title is already taken'
            ], 200);
        }
    }
}
