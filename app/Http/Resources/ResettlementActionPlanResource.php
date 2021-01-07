<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\ResettlementActionPlanController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;

class ResettlementActionPlanResource extends JsonResource
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
        return [
            'id'                    => $this->id,
            'y2016'                 => (float) $this->y2016,
            'y2017'                 => (float) $this->y2017,
            'y2018'                 => (float) $this->y2018,
            'y2019'                 => (float) $this->y2019,
            'y2020'                 => (float) $this->y2020,
            'y2021'                 => (float) $this->y2021,
            'y2022'                 => (float) $this->y2022,
            'y2023'                 => (float) $this->y2023,
            'y2024'                 => (float) $this->y2024,
            'y2025'                 => (float) $this->y2025,
            'affected_households'   => $this->affected_households,
            'links'                 => $this->links(ResettlementActionPlanController::class),
        ];
    }
}
