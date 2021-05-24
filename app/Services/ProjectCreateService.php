<?php

namespace App\Services;

use App\Models\FundingSource;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProjectCreateService
{
    public $project;

    public function create(array $data)
    {
        $this->project = Project::create($data);

        $this->createRelated($data['relations']);

        $this->createHasOne($data);

        $this->createHasOne($data);

        $this->createRegionInvestments($data['region_investments']);

        $this->createFsInvestments($data['fs_investments']);

        if ($this->project->has_infra) {
            $this->createFsInfrastructures($data['fs_infrastructures']);
        }

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
    }

    public function createRegionInvestments($regionInvestments)
    {
        $regions = Region::where('id','<>',100)->get();

        foreach ($regions as $region) {
            if (!empty($regionInvestments)) {
                $regionToInsert = $regionInvestments->filter(function ($item) use ($region) {
                    return $item['region_id'] == $region->id;
                })->first();

                if ($regionToInsert) {
                    $this->project->region_investments()->create($regionToInsert);
                } else {
                    $this->project->region_investments()->create([
                        'region_id' => $region->id,
                    ]);
                }
            }

            if ($this->project->has_infra) {
                $this->project->region_infrastructures()->create([
                    'region_id' => $region->id
                ]);
            }
        }
    }

    public function createFsInvestments($investments)
    {
        $fundingSources = FundingSource::all();

        foreach ($fundingSources as $fs) {
            if (!empty($investments)) {
                $fsToInsert = $investments->filter(function ($item) use ($fs) {
                    return $item['fs_id'] == $fs->id;
                })->first();

                if ($fsToInsert) {
                    $this->project->fs_investments()->create($fsToInsert);
                } else {
                    $this->project->fs_investments()->create([
                        'fs_id' => $fs->id,
                    ]);
                }
            }
        }
    }

    public function createFsInfrastructures($investments)
    {
        $fundingSources = FundingSource::all();

        foreach ($fundingSources as $fs) {
            if (!empty($investments)) {
                $fsToInsert = $investments->filter(function ($item) use ($fs) {
                    return $item['fs_id'] == $fs->id;
                })->first();

                if ($fsToInsert) {
                    $this->project->fs_infrastructures()->create($fsToInsert);
                } else {
                    $this->project->fs_infrastructures()->create([
                        'fs_id' => $fs->id,
                    ]);
                }
            }
        }
    }
}
