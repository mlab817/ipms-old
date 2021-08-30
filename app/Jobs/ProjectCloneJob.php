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

        \Log::debug('updating period id: ' . $updatingPeriodId);
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

        // duplicate the model including relationships
        $clone = $project->duplicate();

        // retrieve so we can change updating period and creator
        $clonedProject = Project::find($clone->id);

        // turn off logging so as not to trigger revisionable trait or activity log
        Project::withoutEvents(function () use ($clonedProject) {
            $clonedProject->updating_period_id = $this->updatingPeriodId;
            $clonedProject->created_by = $this->userId;
            $clonedProject->save();
        });

        $regionInvestments = $project->region_investments;

        foreach ($regionInvestments as $regionInvestment) {
            $clonedProject->region_investments()->create([
                'region_id' => $regionInvestment->region_id,
                'y2022' => $regionInvestment->y2016
                    + $regionInvestment->y2017
                    + $regionInvestment->y2018
                    + $regionInvestment->y2019
                    + $regionInvestment->y2020
                    + $regionInvestment->y2021
                    + $regionInvestment->y2022,
                'y2023' => $regionInvestment->y2023,
            ]);
        }

        $regionInfrastructures = $project->region_infrastructures;

        foreach ($regionInfrastructures as $regionInfrastructure) {
            $clonedProject->region_infrastructures()->create([
                'region_id' => $regionInfrastructure->region_id,
                'y2022' => $regionInfrastructure->y2016
                    + $regionInfrastructure->y2017
                    + $regionInfrastructure->y2018
                    + $regionInfrastructure->y2019
                    + $regionInfrastructure->y2020
                    + $regionInfrastructure->y2021
                    + $regionInfrastructure->y2022,
                'y2023' => $regionInfrastructure->y2023,
            ]);
        }

        $fsInvestments = $project->fs_investments;

        foreach ($fsInvestments as $fsInvestment) {
            $clonedProject->fs_investments()->create([
                'fs_id' => $fsInvestment->fs_id,
                'y2022' => $fsInvestment->y2016
                    + $fsInvestment->y2017
                    + $fsInvestment->y2018
                    + $fsInvestment->y2019
                    + $fsInvestment->y2020
                    + $fsInvestment->y2021
                    + $fsInvestment->y2022,
                'y2023' => $fsInvestment->y2023,
            ]);
        }

        $fsInfrastructures = $project->fs_infrastructures;

        foreach ($fsInfrastructures as $fsInfrastructure) {
            $clonedProject->fs_infrastructures()->create([
                'fs_id' => $fsInfrastructure->fs_id,
                'y2022' => $fsInfrastructure->y2016
                    + $fsInfrastructure->y2017
                    + $fsInfrastructure->y2018
                    + $fsInfrastructure->y2019
                    + $fsInfrastructure->y2020
                    + $fsInfrastructure->y2021
                    + $fsInfrastructure->y2022,
                'y2023' => $fsInfrastructure->y2023,
            ]);
        }


        // note that this will output cloned original project id in log description
        // but will reference the cloned project in performedOn
        activity()
            ->causedBy(User::find($this->userId))
            ->performedOn($clonedProject)
            ->log('Cloned Project #' . $project->id);

        return 0;
    }
}
