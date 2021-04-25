<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectsDataTable;
use App\Http\Requests\StoreProjectRequest;
use App\Models\ApprovalLevel;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PdpIndicator;
use App\Models\PipTypology;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
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
        $project = new Project;

        $years = [];

        for ($i =2016; $i <= 2023; $i++) {
            array_push($years, $i);
        }

        return view('projects.form', compact('project'))
            ->with('pageTitle', 'Add New Project')
            ->with([
                'pap_types'                 => PapType::all(),
                'bases'                     => Basis::all(),
                'project_statuses'          => ProjectStatus::all(),
                'spatial_coverages'         =>  SpatialCoverage::all(),
                'regions'                   =>  Region::all(),
                'pip_typologies'            => PipTypology::all(),
                'cip_types'                 => CipType::all(),
                'years'                     => $years,
                'approval_levels'           => ApprovalLevel::all(),
                'infrastructure_sectors'    =>  InfrastructureSector::with('children')->get(),
                'pdp_chapters'              =>  PdpChapter::all(),
                'sdgs'                      => Sdg::all(),
                'ten_point_agendas'         => TenPointAgenda::all(),
//                'pdp_indicators'          => PdpIndicator::select('id','name')->get(),
                'funding_sources'           => FundingSource::all(),
                'funding_institutions'      => FundingInstitution::all(),
                'implementation_modes'      =>  ImplementationMode::all(),
                'tiers'                     => Tier::all(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return Response
     */
    public function store(StoreProjectRequest $request)
    {
        dd($request);
        try {
            $project = Project::create($request->all());
        } catch (\Exception $e) {
            throw $e;
        }

        return redirect()->route('projects.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        //
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
}
