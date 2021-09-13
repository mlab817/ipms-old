<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Venturecraft\Revisionable\RevisionableTrait;

class FsInvestment extends Model
{
    use HasFactory;
    use HasUuid;
    use RevisionableTrait;

    protected $revisionFormattedFieldNames = [
        'y2016' => 'fs_investment_2016',
        'y2017' => 'fs_investment_2017',
        'y2018' => 'fs_investment_2018',
        'y2019' => 'fs_investment_2019',
        'y2020' => 'fs_investment_2020',
        'y2021' => 'fs_investment_2021',
        'y2022' => 'fs_investment_2022',
        'y2023' => 'fs_investment_2023',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:m:s',
        'updated_at' => 'datetime:Y-m-d H:m:s',
        'y2016' => 'float',
        'y2017' => 'float',
        'y2018' => 'float',
        'y2019' => 'float',
        'y2020' => 'float',
        'y2021' => 'float',
        'y2022' => 'float',
        'y2023' => 'float',
        'y2024' => 'float',
        'y2025' => 'float',
        'y2026' => 'float',
        'y2027' => 'float',
        'y2028' => 'float',
        'y2029' => 'float',
    ];

    protected $touches = [
        'project'
    ];

    protected $with = [
        'funding_source',
    ];

    protected $fillable = [
        'project_id',
        'fs_id',
        'y2016',
        'y2017',
        'y2018',
        'y2019',
        'y2020',
        'y2021',
        'y2022',
        'y2023',
        'y2024',
        'y2025',
        'y2026',
        'y2027',
        'y2028',
        'y2029',
    ];

    protected $hidden = ['project_id','uuid'];

    public function funding_source(): BelongsTo
    {
        return $this->belongsTo(FundingSource::class,'fs_id','id')->withDefault();
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
