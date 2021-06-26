<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('dashboard', [
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
            'chart'         => $chart,
            'reviews'       => Review::with('user')->has('project')->latest()->take(5)->get(),
            'latestProjects'=> Project::with('pap_type','project_status','creator.office','office')->latest()->take(5)->get(),
            'users'         => User::whereHas('roles', function ($q) {
                $q->where('name','reviewer.main')
                    ->orWhere('name','reviewer');
            })->withCount('projects','reviews')->get(),
        ]);
    }

    public function focalDashboard()
    {
        $projectSummary = DB::table('projects AS a')
            ->join('fs_investments AS b','a.id','=','b.project_id')
            ->select(DB::raw('
                SUM(y2016) AS `2016`,
                SUM(y2017) AS `2017`,
                SUM(y2018) AS `2018`,
                SUM(y2019) AS `2019`,
                SUM(y2020) AS `2020`,
                SUM(y2021) AS `2021`,
                SUM(y2022) AS `2022`,
                SUM(y2023) AS `2023`
            '))
            ->groupBy('a.office_id')
            ->where('a.office_id', auth()->user()->office_id)
            ->whereNull('a.deleted_at')
            ->get()
            ->mapWithKeys(function ($item) {
                return $item;
            });

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

        return view('dashboard.focal', [
            'projectCount'         => Project::own()->count(),
            'officeProjectsCount'   => Project::ownOffice()->count(),
            'endorsedOfficeProjectsCount' => Project::ownOffice()->where('submission_status_id', 3)->count(),
            'endorsedOwnProjectsCount' => Project::own()->where('submission_status_id', 3)->count(),
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
            'chart'         => $chart,
            'reviews'       => Review::with('user')->has('project')->latest()->take(5)->get(),
            'latestProjects'=> Project::ownOffice()->with('pap_type','project_status','creator.office','office')->latest()->take(5)->get(),
            'users'         => User::whereHas('roles', function ($q) {
                $q->where('name','reviewer.main')
                    ->orWhere('name','reviewer');
            })->withCount('projects','reviews')->get(),
            'by_year'   => $projectSummary
        ]);
    }
}
