<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\OfficeController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;

class OfficeResource extends JsonResource
{
    use HasLinks;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(parent::toArray($request),
            [
                'created_at'     => (string) $this->created_at,
                'updated_at'     => (string) $this->updated_at,
                'operating_unit' => new OperatingUnitResource($this->operating_unit),
                'links'          => $this->links(OfficeController::class),
            ]);
    }
}
