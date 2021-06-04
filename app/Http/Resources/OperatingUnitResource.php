<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OperatingUnitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'label'                 => $this->name,
//            'name'                  => $this->label,
//            'operating_unit_type'   => new OperatingUnitTypeResource($this->operating_unit_type),
        ];
    }
}
