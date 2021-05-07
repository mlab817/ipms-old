<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectsDataTable;
use App\DataTables\Scopes\AssignedProjectsDataTableScope;
use App\DataTables\Scopes\OfficeProjectsDataTableScope;
use App\DataTables\Scopes\OwnProjectsDataTableScope;
use App\DataTables\Scopes\ProjectsDataTableScope;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\FsInvestment;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\OperatingUnit;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PdpIndicator;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\RegionInvestment;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    const PROJECTS_INDEX = 'projects.own';

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(ProjectsDataTable $dataTable)
    {
        return $dataTable
            ->render('projects.index', ['pageTitle' => 'Projects']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        abort_if(! auth()->user()->hasPermissionTo('projects.create'), 403, 'Unauthorized');

        $project = new Project;

        return view('projects.create', compact('project'))
            ->with('pageTitle', 'Add New Project')
            ->with([
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         => SpatialCoverage::all(),
                'regions'                   => Region::all(),
                'gads'                      => Gad::all(),
                'years'                     => config('ipms.editor.years'),
                'approval_levels'           => ApprovalLevel::all(),
                'pdp_chapters'              => PdpChapter::all(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
                'pdp_indicators'            => PdpIndicator::with('children.children.children')
                                                    ->where('level',1)
                                                    ->orWhereNull('parent_id')
                                                    ->select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      =>  ImplementationMode::all(),
                'tiers'                     => Tier::all(),
                'preparation_documents'     => PreparationDocument::all(),
                'fs_statuses'               => FsStatus::all(),
                'operating_units'           => OperatingUnit::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return Response
     * @throws \Exception
     */
    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());

        $project->bases()->sync($request->bases);
        $project->regions()->sync($request->regions);
        $project->funding_sources()->sync($request->funding_sources);
        $project->sdgs()->sync($request->sdgs);
        $project->pdp_chapters()->sync($request->pdp_chapters);
        $project->pdp_indicators()->sync($request->pdp_indicators);
        $project->ten_point_agendas()->sync($request->ten_point_agendas);
        $project->operating_units()->sync($request->operating_units);

        $project->fs_investments()->createMany($request->fs_investments);
        $project->region_investments()->createMany($request->region_investments);

        $project->feasibility_study()->create($request->feasibility_study);
        $project->nep()->create($request->nep);
        $project->allocation()->create($request->allocation);
        $project->disbursement()->create($request->disbursement);

        $project->created_by = Auth::id();
        $project->save();

        if ($request->has('new')) {
            return redirect()->route('projects.create');
        }

        if ($request->has('view')) {
            return redirect()->route('projects.show', $project->uuid);
        }

        if ($request->has('edit')) {
            return redirect()->route('projects.edit', $project->uuid);
        }


        return redirect()->route('projects.index')
            ->with('message', 'Successfully added project.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'))
            ->with('pageTitle', $project->title);
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
            ->with('pageTitle', 'Edit Project')
            ->with([
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         =>  SpatialCoverage::all(),
                'regions'                   =>  Region::all(),
                'pip_typologies'            => PipTypology::all(),
                'cip_types'                 => CipType::all(),
                'years'                     => config('ipms.editor.years'),
                'approval_levels'           => ApprovalLevel::all(),
                'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
                'pdp_chapters'              => PdpChapter::all(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
                'pdp_indicators'            => PdpIndicator::with('children.children.children')
                    ->where('level',1)
                    ->orWhereNull('parent_id')
                    ->select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      => ImplementationMode::all(),
                'tiers'                     => Tier::all(),
                'preparation_documents'     => PreparationDocument::all(),
                'fs_statuses'               => FsStatus::all(),
                'operating_units'           => OperatingUnit::all(),
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
        $project->update($request->all());

        $project->bases()->sync($request->bases);
        $project->regions()->sync($request->regions);
        $project->funding_sources()->sync($request->funding_sources);
        $project->sdgs()->sync($request->sdgs);
        $project->pdp_chapters()->sync($request->pdp_chapters);
        $project->pdp_indicators()->sync($request->pdp_indicators);
        $project->ten_point_agendas()->sync($request->ten_point_agendas);
        $project->operating_units()->sync($request->operating_units);

        foreach ($request->fs_investments as $fs_investment) {
            $fsToEdit = FsInvestment::where('project_id', $project->id)->where('fs_id', $fs_investment['fs_id'])->first();
            $fsToEdit->update($fs_investment);
//            update(['id' => $fs_investment['id']], $fs_investment);
        }
//
        foreach ($request->region_investments as $region_investment) {
            $itemToEdit = RegionInvestment::where('project_id', $project->id)->where('region_id', $region_investment['region_id'])->first();
            $itemToEdit->update($region_investment);
        }

        $project->feasibility_study()->update($request->feasibility_study);
        $project->nep()->update($request->nep);
        $project->allocation()->update($request->allocation);
        $project->disbursement()->update($request->disbursement);

        return redirect()->route(self::PROJECTS_INDEX);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();

        session()->flash('message', 'Successfully deleted project');

        return response()->json(['message' => 'Successfully deleted project']);
    }

    /**
     * Return user's own projects
     */
    public function own(ProjectsDataTable $dataTable)
    {
        return $dataTable
            ->addScope(new OwnProjectsDataTableScope)
            ->render('projects.index', ['pageTitle' => 'Own Projects']);
    }

    public function office(ProjectsDataTable $dataTable)
    {
        return $dataTable
            ->addScope(new OfficeProjectsDataTableScope)
            ->render('projects.index', ['pageTitle' => 'Office Projects']);
    }

    public function assigned(ProjectsDataTable $dataTable)
    {
        return $dataTable
            ->addScope(new AssignedProjectsDataTableScope)
            ->render('projects.index', ['pageTitle' => 'Assigned Projects']);
    }
}
