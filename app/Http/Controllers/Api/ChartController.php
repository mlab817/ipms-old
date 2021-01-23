<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FundingSource;
use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function regions(): JsonResponse
    {
        // returns label: total_investment
        $regions = Region::all()->pluck('total_investment','label');

        return response()->json([
            'original' => $regions,
            'categories' => $regions->keys(),
            'data' => $regions->values(),
        ]);
    }

    public function funding_sources(): JsonResponse
    {
        $fs = FundingSource::all();

        return response()->json($fs);
    }
}
