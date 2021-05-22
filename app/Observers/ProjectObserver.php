<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\ProjectAudit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

        // add office_id to project so users can detect it as office projects
        $project->office_id = auth()->user()->office_id;
    }
}
