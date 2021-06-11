<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pipol extends Model
{
    use HasFactory;
    use SoftDeletes;

    const SPATIAL_COVERAGE = [
        'NATIONWIDE'        => 'Nationwide',
        'INTERREGIONAL'     => 'Interregional',
        'REGIONSPECIFIC'    => 'Region Specific',
        'ABROAD'            => 'Abroad',
    ];

    const CATEGORIES = [
        'ONGOING'           => 'Ongoing',
        'PROPOSED'          => 'Proposed',
        'COMPLETED'         => 'Completed',
        'DROPPED'           => 'Dropped',
    ];

    const SUBMISSION_STATUS = [
        'ENDORSED'          => 'Endorsed',
        'DRAFT'             => 'Draft',
    ];

    protected $fillable = [
        'pipol_code',
        'project_title',
        'spatial_coverage',
        'category',
        'submission_status',
        'pipol_url',
        'ipms_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class,'ipms_id','id')->withDefault();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id')->withDefault();
    }
}
