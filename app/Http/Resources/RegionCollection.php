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
                    'id'                => $this->id,
                    'name'              => $this->label,
                    'label'             => $this->name,
                    'investment'        => new InvestmentResource($this->investment),
                    'infrastructure'    => new InvestmentResource($this->infrastructure),
                ];
            }),
        ];
    }
}
