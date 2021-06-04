<?php

namespace App\Http\Resources;

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\ResourceLinks\HasLinks;
use Spatie\ResourceLinks\HasMeta;

class ProjectResource extends JsonResource
{
    public static $wrap = 'project';

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
//            'id'                        => $this->id,
//            'uuid'                      => $this->uuid,
//            'code'                      => $this->code,
            'title'                     => $this->title,
//            'slug'                      => $this->slug,
            'pap_type_id'               => $this->pap_type_id,
            'pap_type'                  => new PapTypeResource($this->pap_type),
            'regular_program'           => (boolean) $this->regular_program,
            'description'               => $this->description,
//            'summary'                   => $this->summary,
            'expected_outputs'          => $this->expected_outputs,
            'spatial_coverage_id'       => $this->spatial_coverage_id,
            'spatial_coverage'          => new SpatialCoverageResource($this->spatial_coverage),
            'regions'                   => RegionResource::collection($this->regions),
            'pip'                       => (boolean) $this->pip,
            'pip_typology'              => new PipTypologyResource($this->review->pip_typology),
            'research'                  => (boolean) $this->research,
            'cip'                       => (boolean) $this->review->cip,
            'ifp'                       => (boolean) $this->review->ifp,
            'cip_type'                  => new CipTypeResource($this->review->cip_type),
            'iccable'                   => (boolean) $this->iccable,
            'approval_level_id'         => $this->approval_level_id,
            'approval_level'            => new ApprovalLevelResource($this->approval_level),
            'approval_date'             => (string) $this->approval_date,
            'trip'                      => (boolean) $this->review->trip,
            'rdip'                      => (boolean) $this->rdip,
            'rdc_endorsement_required'  => $this->rdc_endorsement_required,
            'rdc_endorsed'              => (boolean) $this->rdc_endorsed,
            'rdc_endorsed_date'         => (string) $this->rdc_endorsed_date,
            'infrastructure_subsectors' => InfrastructureSubsectorResource::collection($this->infrastructure_subsectors),
            'other_infrastructure'      => $this->other_infrastructure,
            'risk'                      => $this->risk,
            'pdp_chapter_id'            => $this->pdp_chapter_id,
            'pdp_chapter'               => new PdpChapterResource($this->pdp_chapter),
            'pdp_chapters'               => PdpChapterResource::collection($this->pdp_chapters),
            'no_pdp_indicator'          => (boolean) $this->no_pdp_indicator,
            'pdp_indicators'            => PdpIndicatorResource::collection($this->pdp_indicators),
            'gad_id'                    => $this->gad_id,
            'gad'                       => new GadResource($this->gad),
            'target_start_year'         => $this->target_start_year,
            'target_end_year'           => $this->target_end_year,
            'preparation_document'      => new PreparationDocumentResource($this->preparation_document),
            'has_fs'                    => (boolean) $this->has_fs,
            'feasibility_study'         => new FeasibilityStudyResource($this->feasibility_study),
            'has_row'                   => (boolean) $this->has_row,
            'right_of_way'              => new RightOfWayResource($this->right_of_way),
            'has_rap'                   => (boolean) $this->has_rap,
            'resettlement_action_plan'  => new ResettlementActionPlanResource($this->resettlement_action_plan),
            'employment_generated'      => $this->employment_generated,
            'funding_source_id'         => $this->funding_source_id,
            'funding_source'            => new FundingSourceResource($this->funding_source),
            'funding_sources'           => FundingSourceResource::collection($this->funding_sources),
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
            'office'                    => new OfficeResource($this->office),
            'nep'                       => new NepResource($this->nep),
            'allocation'                => new AllocationResource($this->allocation),
            'disbursement'              => new DisbursementResource($this->disbursement),

            'region_investments'        => RegionInvestmentResource::collection($this->region_investments),
            'region_infrastructures'    => RegionInfrastructureResource::collection($this->region_infrastructures),

            'fs_investments'            => FsInvestmentResource::collection($this->fs_investments),
            'fs_infrastructures'        => FsInfrastructureResource::collection($this->fs_infrastructures),

            'bases'                     => BasisResource::collection($this->bases),
            'sdgs'                      => SdgResource::collection($this->sdgs),
            'ten_point_agendas'         => TenPointAgendaResource::collection($this->ten_point_agendas),
            'prerequisites'             => PrerequisiteResource::collection($this->prerequisites),
            'implementing_agencies'     => OperatingUnitResource::collection($this->implementing_agencies),
            'covid'                     => (bool) $this->covid,
            'covid_interventions'       => CovidInterventionResource::collection($this->covid_interventions),

//            'investment'                => new InvestmentResource($this->investment),
//            'infrastructure'            => new InvestmentResource($this->infrastructure),

//            'creator'                   => new UserResource($this->whenLoaded('creator')),
//            'updater'                   => new UserResource($this->whenLoaded('updater')),
//            'deleter'                   => new UserResource($this->whenLoaded('deleter')),
//            'created_at'                => (string) $this->created_at,
//            'updated_at'                => (string) $this->updated_at,
//            'permissions'               => (array) $this->permissions,
        ];
    }
}
