<?php

namespace App\Http\Controllers;

use App\Jobs\ProjectCloneJob;
use App\Models\Project;
use Illuminate\Http\Request;

class CloneProjectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:projects,id',
        ]);

        $project = Project::where('project_id', $request->id)
            ->where('updating_period_id', config('ipms.current_updating_period'))
            ->first();

        if ($project) {
            $link = '<a target="_blank" href="'. route('projects.show', $project) .'">#' . $project->id .'</a>';
            return back()
                ->with('error','Project has already been cloned. See ' . $link);
        }

        dispatch(new ProjectCloneJob($request->id, config('ipms.current_updating_period'), auth()->id()));

        return back()
            ->with('success','Successfully cloned project/program');
    }
}
