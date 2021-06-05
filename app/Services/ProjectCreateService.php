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

        $project->feasibility_study()->create($data['feasibility_study']);

        $project->resettlement_action_plan()->create($data['resettlement_action_plan']);

        $project->right_of_way()->create($data['right_of_way']);

        $project->allocation()->create($data['allocation']);

        $project->nep()->create($data['nep']);

        $project->disbursement()->create($data['disbursement']);

        $project->region_investments()->createMany($data['region_investments']);

        $project->fs_investments()->createMany($data['fs_investments']);

        $project->sdgs()->attach($data['sdgs']);

        $project->bases()->attach($data['bases']);

        $project->ten_point_agendas()->attach($data['ten_point_agenda']);

        $project->regions()->attach($data['regions']);

        $project->funding_sources()->attach($data['funding_sources']);

        $project->pdp_chapters()->attach($data['pdp_chapters']);

        $project->pdp_indicators()->attach($data['pdp_indicators']);

        $project->infrastructure_subsectors()->attach($data['infrastructure_subsectors']);

        $project->prerequisites()->attach($data['prerequisites']);

        if ($project->has_infra) {
            $project->fs_infrastructures()->createMany($data['fs_infrastructures']);
        }

        $project->created_by = $data['created_by'];

        $project->save();

        $project->audit_logs()->create([
            'description'  => 'imported',
            'user_id'      => $data['created_by'],
//            'original'     => [],
//            'modified'     => [],
//            'host'         => request()->ip() ?? null,
        ]);

        return $project->refresh();
    }
}
