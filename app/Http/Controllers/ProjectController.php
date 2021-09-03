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
use App\Jobs\ProjectCloneJob;
use App\Jobs\ProjectDeleteJob;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\Collaborator;
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
use App\Models\UpdatingPeriod;
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
//        $this->authorizeResource(Project::class);
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

        return view('projects.index', compact('projects'))
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
        $owner = $request->owner;
        $owner = explode(';', $owner);
        $model = app($owner[0])->find($owner[1]);

        $project = Project::create($request->validated());

        $project->owner()->associate($model);

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
        foreach (FundingSource::all() as $fs) {
            $project->fs_investments()->create(['fs_id' => $fs->id]);
        }

        foreach (Region::all() as $region) {
            $project->region_investments()->create(['region_id' => $region->id]);
        }

        $project->project_update()->create([
            'updates'   => '',
            'updates_date' => '',
        ]);

        $project->expected_output()->create([
            'expected_outputs' => ''
        ]);

        $project->description()->create([
            'description' => ''
        ]);
//
        $project->feasibility_study()->create([]);
        $project->nep()->create([]);
        $project->allocation()->create([]);
        $project->disbursement()->create([]);

        Project::withoutEvents(function () use ($project) {
            $project->office_id = auth()->user()->office_id;
            $project->created_by = auth()->id();
            $project->updating_period_id = config('ipms.current_updating_period');
            $project->project_id = $project->id;
            $project->branch = 'original';
            $project->save();
        });

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
            $project->funding_sources()->sync($request->funding_sources);
        }
        if ($request->has('sdgs')) {
            $project->sdgs()->sync($request->sdgs);
        }
        if ($request->has('pdp_chapters')) {
            $project->pdp_chapters()->sync($request->pdp_chapters);
        }
        if ($request->has('pdp_indicators')) {
            $project->pdp_indicators()->sync($request->pdp_indicators);
        }
        if ($request->has('ten_point_agendas')) {
            $project->ten_point_agendas()->sync($request->ten_point_agendas);
        }
        if ($request->has('operating_units')) {
            $project->operating_units()->sync($request->operating_units);
        }
        if ($request->has('covid_interventions')) {
            $project->covid_interventions()->sync($request->covid_interventions);
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
        if ($request->uuid != $project->uuid) {
            abort(403, 'The code you provided was wrong. Please try again');
        }

        if ($project->isOriginal() && count($project->clones) > 1) {
            return back()->with('error', 'You cannot delete an original project if it has clones. Delete the clones first.');
        }

        dispatch(new ProjectDeleteJob($project->id, auth()->id(), $request->reason));

        return redirect()->route('projects.index');
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

    public function history(Project $project)
    {
        $history = $project->revisionHistory()->latest()->get();
        $history = $history->merge($project->description->revisionHistory()->latest()->get());
        $history = $history->merge($project->expected_output->revisionHistory()->latest()->get());
        $history = $history->merge($project->nep->revisionHistory()->latest()->get());
        $history = $history->merge($project->allocation->revisionHistory()->latest()->get());
        $history = $history->merge($project->disbursement->revisionHistory()->latest()->get());
        $history = $history->merge($project->feasibility_study->revisionHistory()->latest()->get());
        $history = $history->merge($project->project_update->revisionHistory()->latest()->get());

        foreach ($project->region_investments as $ri) {
            $history = $history->merge($ri->revisionHistory()->latest()->get());
        }

        foreach ($project->fs_investments as $fsi) {
            $history = $history->merge($fsi->revisionHistory()->latest()->get());
        }

        return view('projects.history', [
            'project' => $project,
            'history' => $history->sortByDesc('created_at')
        ]);
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
        $project->load('collaborators.user');

        return view('projects.settings', compact('project'))
            ->with('users', User::all());
    }

    public function files(Project $project)
    {
        return view('projects.files', compact('project'));
    }

    public function new_clone()
    {
        $recommendedProjects = auth()->user()
            ->owned_projects()
            ->uncloned()
            ->get();

        return view('projects.clone', compact('recommendedProjects'));
    }

    /**
     * Toggle a project pin
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function togglePin(Project $project)
    {
        if (auth()->user()->pinned_projects->contains($project)) {
            auth()->user()->pinned_projects()->detach($project);
        } else {
            auth()->user()->pinned_projects()->attach($project);
        }

        return back()->with('success', 'Successfully added project to pinned list');
    }

    public function view_invitation(Request $request, Project $project, string $token)
    {
        $collaborator = Collaborator::where('project_id', $project->id)
            ->where('token', $token)
            ->first();

        return view('projects.invitation', compact('project'))
            ->with('collaborator', $collaborator)
            ->with('token', $token);
    }

    public function accept_invite(Request $request, Project $project, string $token)
    {
        $collaborator = $project->collaborators()->where('token', $token)->firstOrFail();

        if ($request->accept) {
            $collaborator->accepted_at = now();
            $collaborator->save();

            return redirect()->route('projects.show', $project)
                ->with('success','Successfully accepted invitation');
        } else {
            $collaborator->delete();

            return redirect()->route('dashboard');
        }
    }

    public function compare(Request $request, Project $project)
    {
        $original = Project::find($request->query('project_id')) ?? null;

        $fsInvestments = $this->reduce($project->fs_investments, 'Current');
        $fsInvestments2 = $this->reduce($original->fs_investments, 'Previous');
        $compareFsInvestments = collect([$fsInvestments, $fsInvestments2]);

        $regionInvestments = $this->reduce($project->region_investments, 'Current');
        $regionInvestments2 = $this->reduce($original->region_investments, 'Previous');
        $compareRegionInvestments = collect([$regionInvestments, $regionInvestments2]);

        // chart 5 is original financial accomp
        // {
        //                    name: 'nep',
        //                    data: [1,2,3,4,5,6,7,8]
        //                },
        //                {
        //                    name: 'allocation',
        //                    data: [1,2,3,4,5,6,7,8]
        //                },
        //                {
        //                    name: 'disbursement',
        //                    data: [1,2,3,4,5,6,7,8]
        //                }
        $compareNep = [];
        $compareAllocation = [];
        $compareDisbursement = [];

        if ($original) {
            $original->load('disbursement','nep','allocation');

            $nep = $this->extractAnnualData($original->nep, 'Previous NEP');
            $nep2 = $this->extractAnnualData($project->nep, 'Current NEP');
            $compareNep = collect([$nep, $nep2]);

            $allocation = $this->extractAnnualData($original->allocation, 'Previous Allocation');
            $allocation2 = $this->extractAnnualData($project->allocation, 'Current Allocation');
            $compareAllocation = collect([$allocation, $allocation2]);

            $disbursement = $this->extractAnnualData($original->disbursement, 'Previous Disbursement');
            $disbursement2 = $this->extractAnnualData($project->disbursement, 'Current Disbursement');
            $compareDisbursement = collect([$disbursement, $disbursement2]);
        }

        return view('projects.compare', [
            'revised'       => $project->load('disbursement','nep','allocation'),
            'original'      => $original,
            'compareFsInvestments' => $compareFsInvestments,
            'compareRegionInvestments' => $compareRegionInvestments,
            'compareNep' => $compareNep,
            'compareAllocation' => $compareAllocation,
            'compareDisbursement' => $compareDisbursement,
            'labels'        => collect($this->labels)->map(function($key) {
                return str_replace('y','',$key);
            }),
            'project'   => $project,
        ]);
    }

    public function extractAnnualData($dataToExtract = [], $name = '')
    {
        $data = new \stdClass();
        $data->name = $name;
        $dataExtracted = array();

        foreach ($this->labels as $key) {
            array_push($dataExtracted, $dataToExtract->{$key});
        }

        $data->data = $dataExtracted;

        return $data;
    }

    public function reduce($dataToReduce, $name = '')
    {
        $carry = [
            'y2016' => 0,
            'y2017' => 0,
            'y2018' => 0,
            'y2019' => 0,
            'y2020' => 0,
            'y2021' => 0,
            'y2022' => 0,
            'y2023' => 0,
        ];

        $data = $dataToReduce->reduce(function ($carry, $item) {
            $carry['y2016'] += $item->y2016;
            $carry['y2017'] += $item->y2017;
            $carry['y2018'] += $item->y2018;
            $carry['y2019'] += $item->y2019;
            $carry['y2020'] += $item->y2020;
            $carry['y2021'] += $item->y2021;
            $carry['y2022'] += $item->y2022;
            $carry['y2023'] += $item->y2023;
            return $carry;
        }, $carry);

        $newClass = new \stdClass();
        $newClass->name = $name;
        $newClass->data = collect($data)->values();

        return $newClass;
    }

    public $labels = ['y2016','y2017','y2018','y2019','y2020','y2021','y2022','y2023'];
}
