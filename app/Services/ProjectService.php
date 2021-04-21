<?php

namespace App\Services;

use App\Http\Resources\FundingSourceCollection;
use App\Http\Resources\FundingSourceResource;
use App\Http\Resources\RegionCollection;
use App\Http\Resources\RegionResource;
use App\Models\FundingSource;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectService
{
    public function create(array $request)
    {
        $project = Project::create($request);

        $project->regions()->sync($request['regions'] ?? []);
        $project->bases()->sync($request['bases'] ?? []);
        $project->funding_sources()->sync($request['funding_sources'] ?? []);
        $project->funding_institutions()->sync($request['funding_institutions'] ?? []);
        $project->implementing_agencies()->sync($request['implementing_agencies'] ?? []);
        $project->pdp_chapters()->sync($request['pdp_chapters'] ?? []);
        $project->prerequisites()->sync($request['prerequisites'] ?? []);
        $project->sdgs()->sync($request['sdgs'] ?? []);
        $project->ten_point_agendas()->sync($request['ten_point_agendas'] ?? []);

        if ($request['allocation']) {
            $project->allocation()->create($request['allocation']);
        }

        if ($request['disbursement']) {
            $project->disbursement()->create($request['disbursement']);
        }

        if ($request['feasibility_study']) {
            $project->feasibility_study()->create($request['feasibility_study']);
        }

        if ($request['nep']) {
            $project->nep()->create($request['nep']);
        }

        if ($request['resettlement_action_plan']) {
            $project->resettlement_action_plan()->create($request['resettlement_action_plan']);
        }

        if ($request['right_of_way']) {
            $project->right_of_way()->create($request['right_of_way']);
        }

        return $project;
    }

    public function getInvestmentByFundingSource(): FundingSourceCollection
    {
        return new FundingSourceCollection(FundingSource::with('investment','infrastructure')->get());
    }

    public function getInvestmentByRegion(): RegionCollection
    {
        return new RegionCollection(Region::with('investment','infrastructure')->get());
    }
}
