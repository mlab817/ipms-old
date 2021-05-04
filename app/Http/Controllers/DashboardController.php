<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $data = collect([]); // Could also be an array

        for ($days_backwards = 2; $days_backwards >= 0; $days_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            $data->push(User::whereDate('created_at', today()->subDays($days_backwards))->count());
        }

        $chart = new SampleChart;
        $chart->minimalist(true);
        $chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $chart->dataset('My dataset', 'line', $data);


        return view('dashboard', [
            'pageTitle'     => 'Dashboard',
            'programCount'  => Project::where('pap_type_id', 1)->count(),
            'projectCount'  => Project::where('pap_type_id', 2)->count(),
            'tripCount'     => Project::where('trip', 1)->count(),
            'userCount'     => User::count(),
            'chart'         => $chart,
        ]);
    }
}
