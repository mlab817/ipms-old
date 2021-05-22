<?php

namespace App\Services;

use App\Models\FundingSource;
use App\Models\Project;
use App\Models\Region;

class ProjectCreateService
{
    public $project;

    public function create(array $data)
    {
        $this->project = Project::create($data);

        $this->createRelated($data['relations']);

        $this->createHasOne($data);

        return $this->project->fresh();
    }

    public function createHasOne(array $data)
    {
        $this->project->feasibility_study()->create($data['feasibility_study']);

        $this->project->resettlement_action_plan()->create($data['resettlement_action_plan']);

        $this->project->right_of_way()->create($data['right_of_way']);

        $this->project->allocation()->create($data['allocation']);

        $this->project->nep()->create($data['nep']);

        $this->project->disbursement()->create($data['disbursement']);
    }

    public function createRelated($relations)
    {
        $this->project->sdgs()->sync($relations['sdgs']);
        $this->project->bases()->sync($relations['bases']);
        $this->project->ten_point_agendas()->sync($relations['ten_point_agenda']);
        $this->project->regions()->sync($relations['regions']);
        $this->project->funding_sources()->sync($relations['funding_sources']);
        $this->project->pdp_chapters()->sync($relations['pdp_chapters']);
        $this->project->pdp_indicators()->sync($relations['pdp_indicators']);
        $this->project->infrastructure_subsectors()->sync($relations['infrastructure_subsectors']);
        $this->project->prerequisites()->sync($relations['prerequisites']);

        $regions = Region::where('id','<>',100)->get();

        foreach ($regions as $region) {
            $insertData = [
                'region_id' => $region->id,
            ];
            $this->project->region_investments()->create($insertData);
            if ($this->project->has_infra) {
                $this->project->region_investments()->create($insertData);
            }
        }

        $fundingSources = FundingSource::all();

        foreach ($fundingSources as $fs) {
            $insertData = [
                'fs_id' => $fs->id,
            ];
            $this->project->fs_investments()->create($insertData);
            if ($this->project->has_infra) {
                $this->project->fs_investments()->create($insertData);
            }
        }
    }
}
