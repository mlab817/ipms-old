<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\RegionResource;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RegionResource::collection(Region::all());
    }

    public function show(Region $region): JsonResponse
    {
        $projects = $region->projects()->with(['office','pap_type','regions'])->paginate(10);

        return response()->json(new ProjectCollection($projects));
    }

    public function chart(): JsonResponse
    {
        $data = DB::table('regions')
            ->leftJoin('region_investments', 'region_investments.region_id','=','regions.id')
            ->leftJoin('projects','region_investments.project_id','=','projects.id')
            ->selectRaw('
                regions.label AS label,
                COUNT(region_investments.project_id) AS project_count,
                IFNULL(SUM(region_investments.y2016),0) AS "2016",
                IFNULL(SUM(region_investments.y2017),0) AS "2017",
                IFNULL(SUM(region_investments.y2018),0) AS "2018",
                IFNULL(SUM(region_investments.y2019),0) AS "2019",
                IFNULL(SUM(region_investments.y2020),0) AS "2020",
                IFNULL(SUM(region_investments.y2021),0) AS "2021",
                IFNULL(SUM(region_investments.y2022),0) AS "2022",
                IFNULL(SUM(region_investments.y2023),0) AS "2023",
                IFNULL(SUM(region_investments.y2024),0) AS "2024",
                IFNULL(SUM(region_investments.y2025),0) AS "2025",
                IFNULL(SUM(region_investments.y2016+region_investments.y2017+region_investments.y2018+region_investments.y2019+region_investments.y2020+region_investments.y2021+region_investments.y2022+region_investments.y2023+region_investments.y2024+region_investments.y2025),0) AS total
            ')
            ->whereNull('projects.deleted_at')
            ->groupBy('regions.id')
            ->get();

        return response()->json([
            'data'      => $data,
            'title'     => 'Number of Projects by Region',
            'categories'=> $data->pluck('label'),
        ]);
    }
}
