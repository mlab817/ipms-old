<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Traits\Trackable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    use HasFactory;
    use HasUuid;
    use Sluggable;
    use Trackable;

    protected $guard_name = 'api';

    protected $fillable = [
        'code', // pipol code
        'title',
        'pap_type_id',
        'regular_program',
        // implementation bases
        'description',
        // implementing_agencies
        'spatial_coverage_id',
        'iccable',
        'approval_level_id',
        'approval_level_date',
        'pip',
        'pip_typology_id',
        'research',
        'cip',
        'cip_type_id',
        'trip',
        'rdip',
        'rdc_endorsement_required',
        'rdc_endorsed',
        'rdc_endorsed_date',
        // trip infra sector and subsectors
        'other_infrastructure',
        // prerequisites
        'risk',
        // infra cost
        'pdp_chapter_id',
        // pdp_chapters
        // pdp_indicators
        'no_pdp_indicator',
        // ten point agenda
        // sdg
        'gad_id',
        'target_start_year',
        'target_end_year',
        'preparation_document_id',
        // feasibility study
        'preparation_document_others',
        'has_fs',
        'has_row',
        'has_rap',
        // rowa
        // resettlement
        'employment_generated',
        // costs
        'funding_source_id',
        // funding_institution
        'implementation_mode_id',
        'other_fs',
        'project_status_id',
        'readiness_level_id',
        'updates',
        'updates_date',
        'uacs_code',
        'tier_id',
        // nep
        // allocation
        // disbursement
    ];

    public function allocation(): HasOne
    {
        return $this->hasOne(Allocation::class);
    }

    public function approval_level(): BelongsTo
    {
        return $this->belongsTo(ApprovalLevel::class);
    }

    public function bases(): BelongsToMany
    {
        return $this->belongsToMany(Basis::class);
    }

    public function cip_type(): BelongsTo
    {
        return $this->belongsTo(CipType::class);
    }

    public function disbursement(): HasOne
    {
        return $this->hasOne(Disbursement::class);
    }

    public function feasibility_study(): HasOne
    {
        return $this->hasOne(FeasibilityStudy::class);
    }

    public function funding_source(): BelongsTo
    {
        return $this->belongsTo(FundingSource::class);
    }

    public function funding_institutions(): BelongsToMany
    {
        return $this->belongsToMany(FundingInstitution::class);
    }

    public function funding_sources(): BelongsToMany
    {
        return $this->belongsToMany(FundingSource::class);
    }

    public function gad(): BelongsTo
    {
        return $this->belongsTo(Gad::class);
    }

    public function infrastructure_subsectors(): BelongsToMany
    {
        return $this->belongsToMany(InfrastructureSubsector::class);
    }

    public function implementation_mode(): BelongsTo
    {
        return $this->belongsTo(ImplementationMode::class);
    }

    public function implementation_readinesses(): BelongsToMany
    {
        return $this->belongsToMany(ImplementationReadiness::class);
    }

    public function implementing_agencies(): BelongsToMany
    {
        return $this->belongsToMany(ImplementingAgency::class);
    }

    public function nep(): HasOne
    {
        return $this->hasOne(Nep::class);
    }

    public function pap_type(): BelongsTo
    {
        return $this->belongsTo(PapType::class);
    }

    public function pdp_chapter(): BelongsTo
    {
        return $this->belongsTo(PdpChapter::class);
    }

    public function pdp_chapters(): BelongsToMany
    {
        return $this->belongsToMany(PdpChapter::class);
    }

    public function pdp_indicators(): BelongsToMany
    {
        return $this->belongsToMany(PdpIndicator::class);
    }

    public function preparation_document(): BelongsTo
    {
        return $this->belongsTo(PreparationDocument::class);
    }

    public function prerequisites(): BelongsToMany
    {
        return $this->belongsToMany(Prerequisite::class);
    }

    public function project_status(): BelongsTo
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function readiness_level(): BelongsTo
    {
        return $this->belongsTo(ReadinessLevel::class);
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class);
    }

    public function resettlement_action_plan(): HasOne
    {
        return $this->hasOne(ResettlementActionPlan::class);
    }

    public function right_of_way(): HasOne
    {
        return $this->hasOne(RightOfWay::class);
    }

    public function spatial_coverage(): BelongsTo
    {
        return $this->belongsTo(SpatialCoverage::class);
    }

    public function sdgs(): BelongsToMany
    {
        return $this->belongsToMany(Sdg::class);
    }

    public function ten_point_agendas(): BelongsToMany
    {
        return $this->belongsToMany(TenPointAgenda::class);
    }

    public function tier(): BelongsTo
    {
        return $this->belongsTo(Tier::class);
    }

    public function getPermissionsAttribute(): array
    {
        $user = auth()->user();

        return [
            'view'          => $user ? $user->can('view', $this) : false,
            'update'        => $user ? $user->can('update', $this) : false,
            'delete'        => $user ? $user->can('delete', $this) : false,
            'restore'       => $user ? $user->can('restore', $this) : false,
            'force-delete'  => $user ? $user->can('force-delete', $this) : false,
        ];
    }

    // relationships

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
