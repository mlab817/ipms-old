<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $data = collect([]); // Could also be an array
        $data->push(Review::count());
        $data->push(Project::count());

        $chart = new SampleChart;
        $chart->minimalist(true);
        $chart->labels(['Reviewed', 'Pending']);
        $chart->dataset('Review Status', 'donut', $data);


        return view('dashboard', [
            'pageTitle'     => 'Dashboard',
            'programCount'  => Project::where('pap_type_id', 1)->count(),
            'projectCount'  => Project::where('pap_type_id', 2)->count(),
            'tripCount'     => Review::where('trip', 1)->count(),
            'pipCount'     => Review::where('pip', 1)->count(),
            'chart'         => $chart,
        ]);
    }
}
