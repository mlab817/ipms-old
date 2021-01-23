<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\Region;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        $chart = new SampleChart;

        // load some data
        $regions = Region::with('total_investment','infrastructure_investment')->get();
        return $regions->map(function ($region) {
            return collect($region)->only('name','total_investment.total','infrastructure_investment.total');
        });

        $chart->labels($regions);
        $chart->dataset('Regional Investment', 'bar', $regions);

        return view('chart', compact('chart'));
    }
}
