<?php

namespace App\Services;

use App\Http\Resources\FundingSourceCollection;
use App\Http\Resources\FundingSourceResource;
use App\Http\Resources\RegionCollection;
use App\Http\Resources\RegionResource;
use App\Models\FundingSource;
use App\Models\Region;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectService
{
    public function getInvestmentByFundingSource(): FundingSourceCollection
    {
        return new FundingSourceCollection(FundingSource::with('investment','infrastructure')->get());
    }

    public function getInvestmentByRegion(): RegionCollection
    {
        return new RegionCollection(Region::with('investment','infrastructure')->get());
    }
}
