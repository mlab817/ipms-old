<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        if (in_array(auth()->user()->currentRole->name ?? '',['focal.main','focal'])) {
            return $this->focalDashboard();
        }

        /**
         * TODO: Define different dashboards based on user current role
         * Roles: admin, reviewer.main, reviewer, focal.main, focal
         * Admin is concerned only in the managing the libraries, roles, permissions, users, projects
         * Reviewer main should be able to monitor all projects and reviews
         * Reviewer should be able to monitor only the OUs assigned to them
         * Focal main should be able to manage all projects in their office
         * Focal should be able to manage only their own projects
         */

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
        $chart = null;

        $this->investmentByUpdatingPeriod();

        $ownedProjects = auth()->user()->owned_projects;

        $pinnedProjects = auth()->user()->pinned_projects()->current()->get();

        $activities = Activity::select(DB::raw('created_at, COUNT(id) AS count'))
            ->groupBy('created_at')
            ->get();

        $timestampActivities = [];

        foreach ($activities as $activity) {
            array_push($timestampActivities, [
                Carbon::parse($activity->created_at)->timestamp => $activity->count
            ]);
        }

        return view('dashboard', [
            'activities' => $timestampActivities,
            'pinnedProjects' => $pinnedProjects,
            'randomProjects' => Project::with('pap_type')->get()->random(5),
            'ownedProjects' => $ownedProjects,
            'projectCount'  => Project::count(),
            'reviewCount'   => Project::has('review')->count(),
//            'encodedCount'  => Project::has('pipol')->count(),
            'pipCount'      => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->count(),
            'encodedCount'  => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->has('pipol')->count(),
            'tripCount'      => Project::whereHas('review', function ($q) {
                $q->where('trip', 1);
            })->count(),
//            'encodedCount'  => Review::where('pipol_encoded', true)->count(),
//            'validatedCount'=> Review::where('pipol_validated', true)->count(),
//            'finalizedCount'=> Review::where('pipol_finalized', true)->count(),
            'endorsedCount' => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->whereHas('pipol', function ($q) {
                $q->where('submission_status','Endorsed');
            })->count(),
            'draftCount' => Project::whereHas('review', function ($q) {
                $q->where('pip', 1);
            })->whereHas('pipol', function ($q) {
                $q->where('submission_status','Draft');
            })->count(),
            'userCount'     => User::count(),
            'chart'         => $this->investmentByUpdatingPeriod(),
            'treeMap'       => $this->treeMapData(),
            'reviews'       => Review::with('user')->has('project')->latest()->take(5)->get(),
            'latestProjects'=> Project::with('pap_type','project_status','creator.office','office')->latest()->take(5)->get(),
            'users'         => User::whereHas('roles', function ($q) {
                $q->where('name','reviewer.main')
                    ->orWhere('name','reviewer');
            })->withCount('projects','reviews')->get(),
        ]);
    }

    public function investmentByUpdatingPeriod()
    {
        $data = DB::table('projects AS a')
            ->join('fs_investments AS b','a.id','=','b.project_id')
            ->join('updating_periods AS c', 'a.updating_period_id','=','c.id')
            ->selectRaw('
                c.id AS id,
                c.name AS name,
                sum(b.y2016) AS y2016,
                sum(b.y2017) AS y2017,
                sum(b.y2018) AS y2018,
                sum(b.y2019) AS y2019,
                sum(b.y2020) AS y2020,
                sum(b.y2021) AS y2021,
                sum(b.y2022) AS y2022,
                sum(b.y2023) AS y2023
                ')
            ->groupBy('a.updating_period_id')
            ->get();

        return [
            'series' => $data->map(function ($d) {
               return [
                   'name' => $d->name,
                   'type' => 'column',
                   'data' => [
                       round($d->y2016 / 10**6, 2),
                       round($d->y2017 / 10**6, 2),
                       round($d->y2018 / 10**6, 2),
                       round($d->y2019 / 10**6, 2),
                       round($d->y2020 / 10**6, 2),
                       round($d->y2021 / 10**6, 2),
                       round($d->y2022 / 10**6, 2),
                       round($d->y2023 / 10**6, 2),
                   ]
               ];
            }),
            'labels' => [
                '2016',
                '2017',
                '2018',
                '2019',
                '2020',
                '2021',
                '2022',
                '2023',
            ],
        ];
    }

    public function treeMapData()
    {
        $chartData = DB::table('projects AS a')
            ->join('fs_investments AS b','a.id','=','b.project_id')
            ->selectRaw('
                a.title AS x,
                SUM(b.y2016 + b.y2017 + b.y2018 + b.y2019 + b.y2020 + b.y2021 + b.y2022 + b.y2023) AS y
            ')
            ->where('a.updating_period_id',1)
            ->groupBy('a.id')
            ->orderByDesc('y')
            ->get();

        $first25 = $chartData->splice(25); // all except first 25

        $mergedBack = $chartData->push((object) [
            'x' => 'Others',
            'y' => $first25->sum('y'),
        ]);

        return $mergedBack;
    }
}
