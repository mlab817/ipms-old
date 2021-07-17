<?php

namespace App\Jobs;

use App\Models\Project;
use App\Models\UpdatingPeriod;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProjectCloneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $projectId;

    public $updatingPeriodId;

    public $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $projectId, int $updatingPeriodId, int $userId)
    {
        $this->projectId = $projectId;
        $this->updatingPeriodId = $updatingPeriodId;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // retrieve project
        $project = Project::find($this->projectId);

        // if project is not found, terminate job
        if (! $project) {
            return 0;
        }

        // check that the project has not been duplicated yet for this updating period
        $projectAlreadyDuplicated = Project::where('project_id', $project->id)
            ->where('updating_period_id', $this->updatingPeriodId)
            ->first();

        // if the project has already been duplicated
        // terminate job
        if ($projectAlreadyDuplicated) {
            return 0;
        }

        // duplicate
        $clone = $project->duplicate();

        // retrieve so we can change updating period and creator
        $clonedProject = Project::find($clone->id);

        Project::withoutEvents(function () use ($clonedProject) {
            $clonedProject->updating_period()->associate(UpdatingPeriod::find($this->updatingPeriodId));
            $clonedProject->creator()->associate(User::find($this->userId));
        });

        return 0;
    }
}
