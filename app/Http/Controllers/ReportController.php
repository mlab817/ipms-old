<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\FundingSource;
use App\Models\ImplementationMode;
use App\Models\Office;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function implementation_modes()
    {
        $items = DB::table('implementation_modes','a')
            ->leftJoin('projects AS b','a.id','=','b.implementation_mode_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Modes of Implementation',
                'note'  => 'This table is generated based on the main mode of implementation in which the PAP is tagged/identified. It is NOT reflective of the fund source of the projects. For example, even if a project has funding from other sources (e.g. ODA), if the PAP has been tagged as local procurement implementation, the ODA funding will be counted under the local procurement mode. There are ' .
                    Project::whereNull('implementation_mode_id')->count() . ' with no implementation mode tagged.',
                'projectsMissingData' => Project::with('creator','office')->whereNull('implementation_mode_id')->get(),
            ]);
    }

    public function pap_types()
    {
        $items = DB::table('pap_types','a')
            ->leftJoin('projects AS b','a.id','=','b.pap_type_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Types of PAP',
                'note'  => Project::whereNull('pap_type_id')->count() . ' PAPs with no PAP type identified',
                'projectsMissingData' => Project::with('creator','office')->whereNull('pap_type_id')->get(),
            ]);
    }

    public function offices()
    {
        $items = DB::table('offices','a')
            ->leftJoin('projects AS b','a.id','=','b.office_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Offices',
                'note'  => 'Some PAPs have been tagged as IPD including ' . Project::where('office_id', Office::where('acronym','IPD')->first()->id)->count() . ' entries.',
                'projectsMissingData' => Project::with('creator','office')->where('office_id', Office::where('acronym','IPD')->first()->id)->get(),
            ]);
    }

    public function spatial_coverages()
    {
        $items = DB::table('spatial_coverages','a')
            ->leftJoin('projects AS b','a.id','=','b.spatial_coverage_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Spatial Coverages',
                'note'  => 'The number of PAP here is invalid as the system has assigned a complete list of regions per PAP. There are ' . Project::whereNull('spatial_coverage_id')->count() . ' PAPs with no spatial coverage identified',
                'projectsMissingData' => Project::with('creator','office')->whereNull('spatial_coverage_id')->get(),
            ]);
    }

    public function regions()
    {
        $items = DB::table('regions','a')
            ->leftJoin('region_investments AS b', 'a.id','=','b.region_id')
            ->leftJoin('projects AS c','c.id','=','b.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.project_id)) AS project_count, SUM(b.y2022) AS y2022, SUM(b.y2017 + b.y2018 + b.y2019 + b.y2020 + b.y2021 + b.y2022) AS six_years, SUM(b.y2016 + b.y2017 + b.y2018 + b.y2019 + b.y2020 + b.y2021 + b.y2022 + b.y2023) AS total_project_cost')
            ->whereNull('c.deleted_at')
            ->groupBy('a.id')
            ->orderBy('a.order','ASC')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Regions',
                'note'  => 'The number of PAP here is invalid as the system has assigned a complete list of regions per PAP.',
            ]);
    }

    public function funding_sources()
    {
        $items = DB::table('funding_sources','a')
            ->leftJoin('projects AS c','a.id','=','c.funding_source_id')
            ->leftJoin('fs_investments AS b', 'a.id','=','b.fs_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(c.id)) AS project_count, SUM(b.y2022) AS y2022, SUM(b.y2017 + b.y2018 + b.y2019 + b.y2020 + b.y2021 + b.y2022) AS six_years, SUM(b.y2016 + b.y2017 + b.y2018 + b.y2019 + b.y2020 + b.y2021 + b.y2022 + b.y2023) AS total_project_cost')
            ->whereNull('c.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Funding Sources',
                'note'  => 'The number of PAP here is invalid as the system has assigned a complete list of regions per PAP. There are ' . Project::whereNull('funding_source_id')->count() . ' PAPs with no funding source identified',
                'projectsMissingData' => Project::with('creator','office')->whereNull('funding_source_id')->get(),
            ]);
    }

    public function tiers()
    {
        $items = DB::table('tiers','a')
            ->leftJoin('projects AS b','a.id','=','b.tier_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Budget Tier (Categorization)',
                'note'  => 'The number of PAP here is invalid as the system has assigned a complete list of regions per PAP. There are ' . Project::whereNull('tier_id')->count() . ' PAPs with no funding source identified',
                'projectsMissingData' => Project::with('creator','office')->whereNull('tier_id')->get(),
            ]);
    }

    public function pdp_chapters()
    {
        $items = DB::table('pdp_chapters','a')
            ->leftJoin('projects AS b','a.id','=','b.pdp_chapter_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->orderBy('a.name')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Main PDP Chapter',
                'note'  => 'There are ' . Project::whereNull('pdp_chapter_id')->count() . ' PAPs with no PDP chapter identified',
                'projectsMissingData' => Project::with('creator','office')->whereNull('pdp_chapter_id')->get(),
            ]);
    }

    public function project_statuses()
    {
        $items = DB::table('project_statuses','a')
            ->leftJoin('projects AS b','a.id','=','b.project_status_id')
            ->leftJoin('fs_investments AS c', 'b.id','=','c.project_id')
            ->selectRaw('a.id, a.name, COUNT(DISTINCT(b.id)) AS project_count, SUM(c.y2022) AS y2022, SUM(c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022) AS six_years, SUM(c.y2016 + c.y2017 + c.y2018 + c.y2019 + c.y2020 + c.y2021 + c.y2022 + c.y2023) AS total_project_cost')
            ->whereNull('b.deleted_at')
            ->groupBy('a.id')
            ->get();

        return view('reports.reports', compact('items'))
            ->with([
                'reportVar' => 'Project Status',
                'note'  => 'There are ' . Project::whereNull('project_status_id')->count() . ' PAPs with no status identified',
                'projectsMissingData' => Project::with('creator','office')->whereNull('project_status_id')->get(),
            ]);
    }
}
