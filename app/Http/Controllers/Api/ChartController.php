<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FsInvestment;
use App\Models\FundingSource;
use App\Models\PapType;
use App\Models\Project;
use App\Models\Region;
use App\Models\SpatialCoverage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function regions(): JsonResponse
    {
        $regions = Region::all()->pluck('project_count','label');

        return response()->json([
            'original'      => $regions,
            'title'         => 'Number of Projects by Region',
            'categories'    => $regions->keys(),
            'data'          => $regions->values(),
        ]);
    }

    public function funding_sources(): JsonResponse
    {
        $fs = FundingSource::all();

        return response()->json($fs);
    }

    public function spatial_coverages(): JsonResponse
    {
        $data = SpatialCoverage::all()->pluck('project_count', 'name');

        return response()->json([
            'original'      => $data,
            'title'         => 'Number of Projects by Spatial Coverage',
            'categories'    => $data->keys(),
            'data'          => $data->values(),
        ]);
    }

    public function pap_types(): JsonResponse
    {
        $data = PapType::all()->pluck('project_count', 'name');

        return response()->json([
            'original'      => $data,
            'title'         => 'Number of Projects by PAP Type',
            'categories'    => $data->keys(),
            'data'          => $data->values(),
        ]);
    }

    public function implementation_start(): JsonResponse
    {
        $data = DB::table('projects')
            ->select(DB::raw('count(id) as project_count, target_start_year'))
            ->whereNotNull('target_start_year')
            ->whereNull('deleted_at')
            ->groupBy('target_start_year')
            ->orderBy('target_start_year','ASC')
            ->get()
            ->pluck('project_count','target_start_year');

        return response()->json([
            'original'      => $data,
            'title'         => 'Number of Projects by Implementation Start',
            'categories'    => $data->keys(),
            'data'          => $data->values(),
        ]);
    }

    public function main_funding_source(): JsonResponse
    {
        $data = DB::table('projects')
            ->select(DB::raw('count(projects.id) as project_count, funding_source_id, funding_sources.name AS label'))
            ->leftJoin('funding_sources','projects.funding_source_id','=','funding_sources.id')
            ->whereNotNull('funding_source_id')
            ->whereNull('deleted_at')
            ->groupBy('funding_source_id')
            ->orderBy('funding_source_id','ASC')
            ->get()
            ->pluck('project_count','label');

        return response()->json([
            'original'      => $data,
            'title'         => 'Number of Projects by Main Funding Source',
            'categories'    => $data->keys(),
            'data'          => $data->values(),
        ]);
    }
}
