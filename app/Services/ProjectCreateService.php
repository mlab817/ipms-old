<?php

namespace App\Services;

use App\Models\FundingSource;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ProjectCreateService
{
    public function create(array $data)
    {
        $project = Project::create($data);

        $this->project->feasibility_study()->create($data['feasibility_study']);

        $this->project->resettlement_action_plan()->create($data['resettlement_action_plan']);

        $this->project->right_of_way()->create($data['right_of_way']);

        $this->project->allocation()->create($data['allocation']);

        $this->project->nep()->create($data['nep']);

        $this->project->disbursement()->create($data['disbursement']);

        $this->project->region_investments()->createMany($data['region_investments']);

        $this->project->fs_investments()->createMany($data['fs_investments']);

        $this->project->sdgs()->attach($data['sdgs']);

        $this->project->bases()->attach($data['bases']);

        $this->project->ten_point_agendas()->attach($data['ten_point_agenda']);

        $this->project->regions()->attach($data['regions']);

        $this->project->funding_sources()->attach($data['funding_sources']);

        $this->project->pdp_chapters()->attach($data['pdp_chapters']);

        $this->project->pdp_indicators()->attach($data['pdp_indicators']);

        $this->project->infrastructure_subsectors()->attach($data['infrastructure_subsectors']);

        $this->project->prerequisites()->attach($data['prerequisites']);

        if ($this->project->has_infra) {
            $this->project->fs_infrastructures()->createMany($data['fs_infrastructures']);
        }

        $this->project->created_by = $data['created_by'];

        $project->save();

        $this->project->audit_logs()->create([
            'description'  => 'imported',
            'user_id'      => $data['created_by'],
//            'original'     => [],
//            'modified'     => [],
//            'host'         => request()->ip() ?? null,
        ]);

        return $project->fresh();
    }
}
