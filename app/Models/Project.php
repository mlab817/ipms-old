<?php

namespace App\Models;

use App\Traits\HasUuid;
use App\Traits\Trackable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use HasFactory;
    use HasUuid;
    use Searchable;
    use Sluggable;
    use Trackable;
    use SoftDeletes;

    protected $guard_name = 'api';

    public $asYouType = true;

    protected $fillable = [
        'code', // pipol code
        'title',
        'pap_type_id',
        'regular_program',
        // implementation bases
        'description',
        'summary',
        'expected_outputs',
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
        'mitigation_strategy',
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

    protected $with = [
        'creator',
        'updater',
        'deleter',

        'regions',
        'bases',
        'funding_sources',
        'funding_institutions',
        'implementing_agencies',
        'pdp_chapters',
        'prerequisites',
        'sdgs',
        'ten_point_agendas',

        'nep',
        'allocation',
        'disbursement',

        'ou_investments',
        'ou_infrastructures',
        'region_investments',
        'region_infrastructures',
        'fs_investments',
        'fs_infrastructures',
        'infrastructure_subsectors',
        'pdp_indicators',
    ];

    protected $appends = [
        'total_investment',
        'total_infrastructure',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function allocation(): HasOne
    {
        return $this->hasOne(Allocation::class,'project_id');
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

    public function fs_investments(): HasMany
    {
        return $this->hasMany(FsInvestment::class);
    }

    public function fs_infrastructures(): HasMany
    {
        return $this->hasMany(FsInfrastructure::class);
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

    public function implementation_mode(): BelongsTo
    {
        return $this->belongsTo(ImplementationMode::class);
    }

    public function implementing_agencies(): BelongsToMany
    {
        return $this->belongsToMany(OperatingUnit::class,'implementing_agency_project','project_id','operating_unit_id','id','id');
    }

    public function infrastructure_subsectors(): BelongsToMany
    {
        return $this->belongsToMany(InfrastructureSubsector::class,'infrastructure_subsector_project','is_id','project_id','id','id');
    }

    public function nep(): HasOne
    {
        return $this->hasOne(Nep::class);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class,'office_id');
    }

    public function operating_unit(): BelongsTo
    {
        return $this->belongsTo(OperatingUnit::class);
    }

    public function ou_investments(): HasMany
    {
        return $this->hasMany(OuInvestment::class);
    }

    public function ou_infrastructures(): HasMany
    {
        return $this->hasMany(OuInfrastructure::class);
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
        return $this->belongsToMany(PdpIndicator::class,'pdp_indicator_project','pi_id','project_id');
    }

    public function pip_typology(): BelongsTo
    {
        return $this->belongsTo(PipTypology::class);
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

    public function region_investments(): HasMany
    {
        return $this->hasMany(RegionInvestment::class);
    }

    public function region_infrastructures(): HasMany
    {
        return $this->hasMany(RegionInfrastructure::class);
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
        return $this->belongsToMany(TenPointAgenda::class,'project_ten_point_agenda','project_id','tpa_id','id','id');
    }

    public function tier(): BelongsTo
    {
        return $this->belongsTo(Tier::class);
    }

    public function investment(): HasOne
    {
        return $this->hasOne(FsInvestment::class,'project_id')
            ->selectRaw('sum(y2016) as "y2016"')
            ->selectRaw('sum(y2017) as "y2017"')
            ->selectRaw('sum(y2018) as "y2018"')
            ->selectRaw('sum(y2019) as "y2019"')
            ->selectRaw('sum(y2020) as "y2020"')
            ->selectRaw('sum(y2021) as "y2021"')
            ->selectRaw('sum(y2022) as "y2022"')
            ->selectRaw('sum(y2023) as "y2023"')
            ->selectRaw('sum(y2024) as "y2024"')
            ->selectRaw('sum(y2025) as "y2025"')
            ->selectRaw('sum(y2016+y2017+y2018+y2019+y2020+y2021+y2022+y2023+y2024+y2025) AS total')
            ->groupBy('project_id');
    }

    public function infrastructure(): HasOne
    {
        return $this->hasOne(FsInfrastructure::class,'project_id')
            ->selectRaw('sum(y2016) as "y2016"')
            ->selectRaw('sum(y2017) as "y2017"')
            ->selectRaw('sum(y2018) as "y2018"')
            ->selectRaw('sum(y2019) as "y2019"')
            ->selectRaw('sum(y2020) as "y2020"')
            ->selectRaw('sum(y2021) as "y2021"')
            ->selectRaw('sum(y2022) as "y2022"')
            ->selectRaw('sum(y2023) as "y2023"')
            ->selectRaw('sum(y2024) as "y2024"')
            ->selectRaw('sum(y2025) as "y2025"')
            ->selectRaw('sum(y2016+y2017+y2018+y2019+y2020+y2021+y2022+y2023+y2024+y2025) AS total')
            ->groupBy('project_id');
    }

    public function getTotalInvestmentAttribute(): float
    {
        return $this->investment->total ?? 0;
    }

    public function getTotalInfrastructureAttribute(): float
    {
        return $this->infrastructure->total ?? 0;
    }

    public function getPermissionsAttribute(): array
    {
        $user = auth()->user();

        return [
            'view'          => true,
            'update'        => $user ? $user->can('update', $this) : false,
            'delete'        => $user ? $user->can('delete', $this) : false,
            'restore'       => $user ? $user->can('restore', $this) : false,
            'force-delete'  => $user ? $user->can('force-delete', $this) : false,
        ];
    }

    // relationships

    public function scopeOwn($query)
    {
        $userId = auth() ? auth()->id() : null;

        return $query->where('created_by', $userId);
    }

    public function scopeOffice($query)
    {
        $user = auth() ? auth()->user() : null;

        if ($user) {
            $officeId = $user->profile->office_id;

            if ($officeId) {
                $query->where('office_id', $officeId);
            }
        }

        return $query;
    }

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

    public function searchableAs(): string
    {
        return 'projects';
    }

    public function toSearchableArray(): array
    {
        return [
            'id'                => $this->id,
            'title'             => $this->title,
//            'description'       => $this->description,
//            'office'            => $this->office ? $this->office->name : null,
        ];
    }
}
