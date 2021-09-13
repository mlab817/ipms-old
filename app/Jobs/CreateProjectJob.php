<?php

namespace App\Jobs;

use App\Models\BaseProject;
use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateProjectJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $baseProject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $baseProjectId)
    {
        $this->baseProject = BaseProject::find($baseProjectId);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $baseProject = $this->baseProject;

        $project = Project::create([
            'title'             => $baseProject->title,
            'pap_type_id'       => $baseProject->pap_type_id,
            'has_infra'         => $baseProject->has_infra,
            'branch_id'         => config('ipms.default_branch'),
            'base_project_id'   => $baseProject->id,
        ]);

        $project->owner()->associate($baseProject->owner)->save();

        dispatch(new GenerateProjectRelationsJob($project->id));
    }
}
