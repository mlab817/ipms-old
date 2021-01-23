<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\FundingSource;
use App\Models\Region;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function regions()
    {
        $chart = new SampleChart;

        // load some data
        $regions = Region::all();
        $chart->title('Investment Requirements by Region');
        $chart->labels($regions->pluck('name'));
        $chart->dataset('Total Investment', 'bar', $regions->pluck('total_investment'));
        $chart->dataset('Infrastructure Investment', 'bar', $regions->pluck('total_infrastructure'));

        return view('chart', compact('chart'));
    }

    public function funding_sources()
    {
        $chart = new SampleChart;

        // load some data
        $regions = FundingSource::all();
        $chart->title('Investment Requirements by Funding Source');
        $chart->labels($regions->pluck('name'));
        $chart->dataset('Total Investment', 'bar', $regions->pluck('total_investment'));
        $chart->dataset('Infrastructure Investment', 'bar', $regions->pluck('total_infrastructure'));
        $chart->loader(true);
        
        return view('chart', compact('chart'));
    }
}
