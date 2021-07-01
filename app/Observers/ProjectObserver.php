<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\SubmissionStatus;

class ProjectObserver
{
    public function updated(Project $project)
    {
        $project->commits()->create([
            'user_id'   => auth()->id() ?? null,
            'commit'    => json_encode($project->with(
                ['bases',
                'covid_interventions',
                'funding_institutions',
                'funding_sources',
                'infrastructure_sectors',
                'infrastructure_subsectors',
                'pdp_chapters',
                'pdp_indicators',
                'prerequisites',
                'regions',
                'sdgs',
                'ten_point_agendas',
                'allocation',
                'description',
                'disbursement',
                'expected_output',
                'feasibility_study',
                'resettlement_action_plan',
                'right_of_way',
                'risk',
                'project_update',
                'fs_investments',
                'fs_infrastructures',
                'nep',
                'operating_units',
                'region_investments',
                'region_infrastructures',]
            )->find($project->id)),
        ]);
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $model)
    {
        // HasMany relationships
        foreach ($model->fs_investments as $item) {
            $item->delete();
        }

        foreach ($model->region_investments as $item) {
            $item->delete();
        }

        foreach ($model->fs_infrastructures as $item) {
            $item->delete();
        }

        foreach ($model->region_infrastructures as $item) {
            $item->delete();
        }

        // BelongsToMany relationships
        $model->regions()->sync([]);
        $model->funding_sources()->sync([]);
        $model->sdgs()->sync([]);
        $model->ten_point_agendas()->sync([]);
        $model->infrastructure_sectors()->sync([]);
        $model->infrastructure_subsectors()->sync([]);
        $model->prerequisites()->sync([]);
        $model->pdp_chapters()->sync([]);
        $model->operating_units()->sync([]);
        $model->pdp_indicators()->sync([]);

        // HasOne relationships
        $model->expected_output()->delete();
        $model->project_update()->delete();
        $model->description()->delete();
        $model->risk()->delete();
        $model->review()->delete();
        $model->allocation()->delete();
        $model->disbursement()->delete();
        $model->nep()->delete();
        $model->right_of_way()->delete();
        $model->feasibility_study()->delete();
        $model->resettlement_action_plan()->delete();
    }
}
