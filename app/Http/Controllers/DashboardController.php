<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard', [
            'pageTitle'     => 'Dashboard',
            'programCount'  => Project::where('pap_type_id', 1)->count(),
            'projectCount'  => Project::where('pap_type_id', 2)->count(),
            'tripCount'     => Project::where('trip', 1)->count(),
            'userCount'     => User::count(),
        ]);
    }
}
