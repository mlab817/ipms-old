<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectPinController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        if (count($project->pinned_projects) >= 10) {
            return back()
                ->with('error', 'You can only pin ten PAPs at a time');
        }

        auth()->user()->pinned_projects()->attach($project);

        return back();
    }
}
