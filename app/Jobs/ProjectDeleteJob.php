<?php

namespace App\Jobs;

use App\Models\Project;
use App\Models\User;
use App\Notifications\ProjectDeletedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProjectDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $projectId;

    public $deleterId;

    public $reason;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $projectId, int $deleterId, string $reason)
    {
        $this->projectId    = $projectId;
        $this->deleterId    = $deleterId;
        $this->reason       = $reason;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info('ProjectDeletedJob is triggered.');

        $project = Project::find($this->projectId);

        $projectArray = $project->toArray();

        $creator = $project->creator;

        if (config('ipms.force_delete')) {
            $project->forceDelete();
        } else {
            $project->delete();
        }

        if ($creator) {
            $creator->notify(new ProjectDeletedNotification($projectArray, User::find($this->deleterId), $this->reason));
        }
    }
}
