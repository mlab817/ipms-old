<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TripController extends Controller
{
    public function index(Request $request)
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
}
