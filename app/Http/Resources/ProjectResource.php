<?php

namespace App\Http\Resources;

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
            'id'                        => $this->id,
            'code'                      => $this->code,
            'title'                     => $this->title,
            'pap_type_id'               => $this->pap_type_id,
            'pap_type'                  => new PapTypeResource($this->pap_type),
            'regular_program'           => (boolean) $this->regular_program,
            'description'               => $this->description,
            'spatial_coverage_id'       => $this->spatial_coverage_id,
            'spatial_coverage'          => new SpatialCoverageResource($this->spatial_coverage),
            'iccable'                   => (boolean) $this->iccable,
            'pip'                       => (boolean) $this->pip,
            'pip_typology_id'           => $this-> pip_typology_id,
            'pip_typology'              => new PipTypologyResource($this->pip_typology),
            'research'                  => (boolean) $this->research,
            'cip'                       => (boolean) $this->cip,
            'cip_type_id'               => $this->cip_type_id,
            'cip_type'                  => new CipTypeResource($this->cip_type),
            'trip'                      => (boolean) $this->trip,
            'rdip'                      => (boolean) $this->rdip,
            'rdc_endorsement_required'  => $this->rdc_endorsement_required,
            'rdc_endorsed'              => (boolean) $this->rdc_endorsed,
            'rdc_endorsed_date'         => (string) $this->rdc_endorsed_date,
            'other_infrastructure'      => $this->other_infrastructure,
            'risk'                      => $this->risk,
            'pdp_chapter_id'            => $this->pdp_chapter_id,
            'pdp_chapter'               => new PdpChapterResource($this->pdp_chapter),
            'no_pdp_indicator'          => (boolean) $this->no_pdp_indicator,
            'gad_id'                    => $this->gad_id,
            'gad'                       => new GadResource($this->gad),
            'target_start_year'         => $this->target_start_year,
            'target_end_year'           => $this->target_end_year,
            'has_fs'                    => (boolean) $this->has_fs,
            'has_row'                   => (boolean) $this->has_row,
            'has_rap'                   => (boolean) $this->has_rap,
            'employment_generated'      => $this->employment_generated,
            'funding_source_id'         => $this->funding_source_id,
            'funding_source'            => new FundingSourceResource($this->funding_source),
            'implementation_mode_id'    => $this->implementation_mode_id,
            'implementation_mode'       => new ImplementationModeResource($this->implementation_mode),
            'other_fs'                  => $this->other_fs,
            'project_status_id'         => $this->project_status_id,
            'project_status'            => new ProjectStatusResource($this->project_status),
            'updates'                   => $this->updates,
            'updates_date'              => (string) $this->updates_date,
            'uacs_code'                 => $this->uacs_code,
            'tier_id'                   => $this->tier_id,
            'tier'                      => new TierResource($this->tier),
            'approval_level_id'         => $this->approval_level_id,
            'approval_level'            => new ApprovalLevelResource($this->approval_level),
            'approval_date'             => (string) $this->approval_date,
            'allocation'                => new AllocationResource($this->allocation),
            'creator'                   => new UserResource($this->creator),
            'updater'                   => new UserResource($this->updater),
            'deleter'                   => new UserResource($this->deleter),
            'created_at'                => (string) $this->created_at,
            'updated_at'                => (string) $this->updated_at,
            'permissions'               => (array) $this->permissions,
        ];
    }
}
