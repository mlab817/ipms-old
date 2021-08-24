<?php

namespace App\Http\Controllers;

use App\Jobs\ProjectCloneJob;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectCloneController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Project $project)
    {
        $this->validate($request, [
            'updating_period_id' => 'required|exists:updating_periods,id'
        ]);

        // check updating period id
        if ($project->updating_period_id == $request->updating_period_id) {
            return back()->with('error','This project has already been cloned to this updating period');
        }

        $projectAlreadyCloned = Project::where('project_id', $project->id)
            ->where('updating_period_id', $request->updating_period_id)
            ->exists();

        if ($projectAlreadyCloned) {
            return back()->with('error','This project has already been cloned to this updating period');
        }

        dispatch(new ProjectCloneJob($project->id, $request->updating_period_id ?? config('ipms.current_updating_period'), auth()->id()));

        return back()->with('message','Successfully began cloning project. This may take some time.');
    }
}
