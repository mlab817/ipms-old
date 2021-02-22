<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PdpIndicatorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'        => $this->id,
            'name'      => $this->name,
            'value'     => $this->id,
            'label'     => $this->name,
            'children'  => PdpIndicatorResource::collection($this->children),
        ];
    }
}
