<?php

namespace App\Http\Resources;

use App\Models\Region;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegionCollection extends ResourceCollection
{
    public $collects = Region::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->transform(function (Region $region) {
                return [
                    'id'                => $region->id,
                    'name'              => $region->name,
                    'label'             => $region->label,
                    'investment'        => $region->investment ? new InvestmentResource($region->investment) : null,
                    'infrastructure'    => $region->infrastructure ? new InvestmentResource($region->infrastructure) : null,
                ];
            }),
        ];
    }
}
