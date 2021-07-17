<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
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
        $model->pipol()->delete();
    }
}
