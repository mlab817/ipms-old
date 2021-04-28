<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\ProjectAudit;
use Illuminate\Support\Facades\Auth;

class ProjectObserver
{
    /**
     * Assign the user as the creator of the project
     *
     * @param Project $project
     */
    public function creating(Project $project)
    {
        $project->creator()->associate(auth()->user());
    }

    /**
     * Handle the Project "created" event.
     *
     * @param Project $project
     * @return void
     */
    public function created(Project $project)
    {
        $audit              = new ProjectAudit;
        $audit->project_id  = $project->id;
        $audit->user_id     = Auth::id();
        $audit->action      = 'Created';
        $audit->save();
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param Project $project
     * @return void
     */
    public function updated(Project $project)
    {
        $audit              = new ProjectAudit;
        $audit->project_id  = $project->id;
        $audit->user_id     = Auth::id();
        $audit->action      = $project->wasChanged();
        $audit->save();
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param Project $project
     * @return void
     */
    public function deleted(Project $project)
    {
        $audit              = new ProjectAudit;
        $audit->project_id  = $project->id;
        $audit->user_id     = Auth::id();
        $audit->action      = 'Delete';
        $audit->save();
    }

    /**
     * Handle the Project "restored" event.
     *
     * @param Project $project
     * @return void
     */
    public function restored(Project $project)
    {
        $audit              = new ProjectAudit;
        $audit->project_id  = $project->id;
        $audit->user_id     = Auth::id();
        $audit->action      = 'Restored';
        $audit->save();
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param Project $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        $audit              = new ProjectAudit;
        $audit->project_id  = $project->id;
        $audit->user_id     = Auth::id();
        $audit->action      = 'Force Deleted';
        $audit->save();
    }
}
