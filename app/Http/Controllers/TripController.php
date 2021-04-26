<?php

namespace App\Http\Controllers;

use App\DataTables\TripDataTable;
use App\Http\Requests\TripStoreRequest;
use App\Models\FundingSource;
use App\Models\InfrastructureSector;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TripController extends Controller
{
    public function index(TripDataTable $dataTable)
    {
        return $dataTable->render('trip.index');
    }

    public function test(Request $request)
    {
        if ($request->ajax()) {
            $projects = DB::table('projects')
                ->leftJoin('spatial_coverages','projects.spatial_coverage_id','=','spatial_coverages.id')
                ->leftJoin('offices','projects.office_id','=','offices.id')
                ->leftJoin('tiers','projects.tier_id','=','tiers.id')
                ->leftJoin('implementation_modes','projects.implementation_mode_id','=','implementation_modes.id')
                ->leftJoin('fs_investments','projects.id','=','fs_investments.project_id')
                ->leftJoin('project_region','projects.id','=','project_region.project_id')
                ->leftJoin('regions','project_region.region_id','=','regions.id')
                ->selectRaw('projects.title, projects.description, projects.expected_outputs, projects.target_start_year, projects.target_end_year')
                ->selectRaw('offices.name AS office')
                ->selectRaw('spatial_coverages.name AS spatial_coverage')
                ->selectRaw('GROUP_CONCAT(regions.label) AS regions')
                ->selectRaw('tiers.name AS tier')
                ->selectRaw('implementation_modes.name AS implementation_mode')
                ->selectRaw('sum(fs_investments.y2022) AS y2022')
                ->selectRaw('sum(fs_investments.y2023) AS y2023')
                ->selectRaw('sum(fs_investments.y2024) AS y2024')
                ->selectRaw('sum(
                        fs_investments.y2016 +
                        fs_investments.y2017 +
                        fs_investments.y2018 +
                        fs_investments.y2019 +
                        fs_investments.y2020 +
                        fs_investments.y2021 +
                        fs_investments.y2022 +
                        fs_investments.y2023 +
                        fs_investments.y2024 +
                        fs_investments.y2025
                    ) AS total_project_cost
                ')
                ->where('projects.trip',true)
                ->groupBy('projects.id')
                ->get();

            return DataTables::of($projects)
                ->make(true);
        }

        return view('trip');
    }

    public function edit(Project $project)
    {
        return view('trip.edit', [
            'pageTitle'                 => 'Edit TRIP Information: '. strtoupper($project->title),
            'project'                   =>  $project->load('infrastructure_sectors','infrastructure_subsectors','resettlement_action_plan','right_of_way','region_infrastructures','fs_infrastructures'),
            'infrastructure_sectors'    => InfrastructureSector::with('children')->get(),
            'regions'                   => Region::all(),
            'funding_sources'           => FundingSource::all(),
        ]);
    }

    public function store(TripStoreRequest $request, Project $project)
    {
        // handle save
        $project->risk                              = $request->risk;
        $project->other_infrastructure              = $request->other_infrastructure;
        $project->save();

        $project->infrastructure_subsectors()->sync($request->infrastructure_subsectors);
        $project->infrastructure_sectors()->sync($request->infrastructure_sectors);

        if (is_null($project->region_infrastructures())) {
            $project->region_infrastructures()->createMany($request->region_infrastructures);
        }

        if (is_null($project->fs_infrastructures())) {
            $project->fs_infrastructures()->createMany($request->fs_infrastructures);
        }

        return redirect()->route('projects.index');
    }

    public function show()
    {

    }
}
