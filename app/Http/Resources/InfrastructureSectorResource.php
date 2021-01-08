<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfrastructureSectorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'        => $this->uuid,
            'name'      => $this->name,
            'slug'      => $this->slug,
            'children'  => InfrastructureSubsectorResource::collection($this->children),
        ];
    }
}
