<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // get daily data of added projects
        $chartData = DB::table('projects')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->orderBy('date','ASC')
            ->groupBy('date')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->date  => $item->count];
            });

        // create chart
        $chart = new SampleChart;
        $chart->labels($chartData->keys());
        $chart->dataset('Projects Added Daily', 'bar', $chartData->values());

        return view('dashboard', [
            'pageTitle'     => 'Dashboard',
            'tripCount'     => Review::where('trip', 1)->count(),
            'projectCount'  => Project::count(),
            'reviewCount'   => Review::count(),
            'encodedCount'  => Review::where('pipol_encoded', true)->count(),
            'ipdValidated'  => Review::where('ipd_validated', true)->count(),
            'validatedCount'=> Review::where('pipol_validated', true)->count(),
            'finalizedCount'=> Review::where('pipol_finalized', true)->count(),
            'endorsedCount' => Review::where('pipol_endorsed', true)->count(),
            'pipCount'      => Review::where('pip', 1)->count(),
            'userCount'     => User::count(),
            'chart'         => $chart,
            'reviews'       => Review::with('user')->latest()->take(5)->get(),
            'latestProjects'=> Project::with('pap_type','project_status','creator.office','office')->latest()->take(5)->get(),
            'users'         => User::whereHas('roles', function ($q) {
                $q->where('name','reviewer.main')
                    ->orWhere('name','reviewer');
            })->withCount('projects','reviews')->get(),
        ]);
    }
}
