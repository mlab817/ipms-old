<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\OfficeController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;

class OfficeResource extends JsonResource
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
            'id'                => $this->id,
            'operating_unit'    => new OperatingUnitResource($this->operating_unit),
            'name'              => $this->name,
//            'acronym'           => $this->acronym,
        ];
    }
}
