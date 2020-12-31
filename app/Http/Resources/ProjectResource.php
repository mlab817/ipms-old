<?php

namespace App\Http\Resources;

use App\Models\ApprovalLevel;
use App\Models\PapType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'title'                 => $this->title,
            'description'           => $this->description,
            'pap_type'              => new PapTypeResource($this->pap_type),
            'cip_type'              => new CipTypeResource($this->cip_type),
            'funding_source'        => new FundingSourceResource($this->funding_source),
            'gad'                   => new GadResource($this->gad),
            'implementation_mode'   => new ImplementationModeResource($this->implementation_mode),
            'pdp_chapter'           => new PdpChapterResource($this->pdp_chapter),
            'project_status'        => new ProjectStatusResource($this->project_status),
            'spatial_coverage'      => new SpatialCoverageResource($this->spatial_coverage),
            'tier'                  => new TierResource($this->tier),
            'iccable'               => (boolean) $this->iccable,
            'approval_level'        => new ApprovalLevelResource($this->approval_level),
            'updates'               => $this->updates,
            'updates_date'          => $this->updates_date,
            'created_at'            => (string) $this->created_at,
            'updated_at'            => (string) $this->updated_at,
            'permissions'           => (array) $this->permissions,
            'regions'               => $this->regions,
            'allocation'            => new AllocationResource($this->allocation),
        ];
    }
}
