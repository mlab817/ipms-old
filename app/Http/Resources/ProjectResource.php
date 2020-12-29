<?php

namespace App\Http\Resources;

use App\Models\PapType;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'title'                 => $this->title,
            'pap_type'              => new PapTypeResource($this->pap_type),
            'cip_type'              => $this->cip_type,
            'funding_source'        => $this->funding_source,
            'gad'                   => new GadResource($this->gad),
            'implementation_mode'   => $this->implementation_mode,
            'pdp_chapter'           => $this->pdp_chapter,
            'project_status'        => $this->project_status,
            'spatial_coverage'      => $this->spatial_coverage,
            'tier'                  => $this->tier,
            'iccable'               => $this->iccable,
            'approval_level'        => $this->approval_level,
            'updates'               => $this->updates,
            'updates_date'          => $this->updates_date,
            'created_at'            => (string) $this->created_at,
            'updated_at'            => (string) $this->updated_at,
            'permissions'           => $this->permissions,
            'regions'               => $this->regions,
        ];
    }
}
