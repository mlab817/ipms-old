<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaseProjectStoreRequest;
use App\Models\ApprovalLevel;
use App\Models\BaseProject;
use App\Models\Basis;
use App\Models\CipType;
use App\Models\CovidIntervention;
use App\Models\FsStatus;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\InfrastructureSector;
use App\Models\Office;
use App\Models\OperatingUnitType;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PdpIndicator;
use App\Models\PipTypology;
use App\Models\PreparationDocument;
use App\Models\ProjectStatus;
use App\Models\Region;
use App\Models\Sdg;
use App\Models\SpatialCoverage;
use App\Models\TenPointAgenda;
use App\Models\Tier;
use Illuminate\Http\Request;

class BaseProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create')
            ->with(['pap_types' => PapType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BaseProjectStoreRequest $request)
    {
        $owner = $request->owner;
        $owner = explode(';', $owner);
        $model = app($owner[0])->find($owner[1]);

        $baseProject = BaseProject::create($request->validated());

        $baseProject->owner()->associate($model);

        return redirect()->route('base-projects.show', $baseProject);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function show(BaseProject $baseProject)
    {
        $baseProject->load('projects');
        $projects = $baseProject->projects;
        $project = $baseProject->projects()->where('is_current', 1)->first();

        return view('projects.show', compact(['baseProject','projects','project']))
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
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function edit(BaseProject $baseProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaseProject $baseProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaseProject  $baseProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaseProject $baseProject)
    {
        //
    }
}
