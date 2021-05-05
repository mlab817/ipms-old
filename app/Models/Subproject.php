<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subproject extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'updated_at' => 'datetime:Y-m-d'
    ];

    protected $fillable = [
        'project_id',
        'operating_unit_id',
        'title',
        'description',
        'expected_outputs',
        'total_cost',
        'funding_year',
        'y2017',
        'y2018',
        'y2019',
        'y2020',
        'y2021',
        'y2022',
    ];

    public function operating_unit(): BelongsTo
    {
        return $this->belongsTo(OperatingUnit::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
