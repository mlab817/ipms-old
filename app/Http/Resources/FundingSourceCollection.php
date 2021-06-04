<?php

namespace App\Http\Resources;

use App\Models\FundingSource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FundingSourceCollection extends ResourceCollection
{
    public $collects = FundingSource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data'  => $this->collection->transform(function (FundingSource $fundingSource) {
                return [
                    'id'                => $fundingSource->id,
                    'name'             => $fundingSource->name,
//                    'slug'              => $fundingSource->slug,
                    'investment'        => $fundingSource->investment ? new InvestmentResource($fundingSource->investment) : null,
                    'infrastructure'    => $fundingSource->infrastructure ? new InvestmentResource($fundingSource->infrastructure) : null,
                ];
            }),
        ];
    }
}
