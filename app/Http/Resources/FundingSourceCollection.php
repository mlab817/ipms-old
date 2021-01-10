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
            'data'  => $this->collection->transform(function (Project $project) {
                return [
                    'id'                => $project->id,
                    'title'             => $project->title,
                    'slug'              => $project->slug,
                    'investment'        => new InvestmentResource($this->investment),
                    'infrastructure'    => new InvestmentResource($this->infrastructure),
                ];
            }),
        ];
    }
}
