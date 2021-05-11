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

        $chart = new SampleChart;
        $chart->labels(['One', 'Two', 'Three']);
        $chart->dataset('My dataset 1', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('dashboard', [
            'pageTitle'     => 'Dashboard',
            'programCount'  => Project::where('pap_type_id', 1)->count(),
            'projectCount'  => Project::where('pap_type_id', 2)->count(),
            'tripCount'     => Review::where('trip', 1)->count(),
            'pipCount'      => Review::where('pip', 1)->count(),
            'userCount'     => User::count(),
            'chart'         => $chart,
            'reviews'       => Review::latest()->take(5)->get(),
            'latestProjects'=> Project::latest()->take(5)->get(),
        ]);
    }
}
