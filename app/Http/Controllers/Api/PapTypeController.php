<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PapTypeResource;
use App\Http\Resources\ProjectCollection;
use App\Models\PapType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class PapTypeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PapTypeResource::collection(PapType::all());
    }

    public function show(PapType $papType): ProjectCollection
    {
        $projects = $papType->projects()->paginate();

        return new ProjectCollection($projects);
    }

    public function chart(): JsonResponse
    {
        $data = DB::table('pap_types')
            ->leftJoin('projects','pap_types.id','=','projects.pap_type_id')
            ->leftJoin('fs_investments', 'fs_investments.project_id','=','projects.id')
            ->selectRaw('
                pap_types.name AS label,
                COUNT(projects.id) AS project_count,
                IFNULL(SUM(fs_investments.y2016),0) AS "2016",
                IFNULL(SUM(fs_investments.y2017),0) AS "2017",
                IFNULL(SUM(fs_investments.y2018),0) AS "2018",
                IFNULL(SUM(fs_investments.y2019),0) AS "2019",
                IFNULL(SUM(fs_investments.y2020),0) AS "2020",
                IFNULL(SUM(fs_investments.y2021),0) AS "2021",
                IFNULL(SUM(fs_investments.y2022),0) AS "2022",
                IFNULL(SUM(fs_investments.y2023),0) AS "2023",
                IFNULL(SUM(fs_investments.y2024),0) AS "2024",
                IFNULL(SUM(fs_investments.y2025),0) AS "2025",
                IFNULL(SUM(fs_investments.y2016+fs_investments.y2017+fs_investments.y2018+fs_investments.y2019+fs_investments.y2020+fs_investments.y2021+fs_investments.y2022+fs_investments.y2023+fs_investments.y2024+fs_investments.y2025),0) AS total
            ')
            ->whereNull('projects.deleted_at')
            ->groupBy('pap_types.id')
            ->get();

        return response()->json([
            'data'  => $data,
            'title' => 'Investment Requirement by Year by PAP Type',
        ]);
    }
}
