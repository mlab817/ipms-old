<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegionInfrastructure extends Model
{
    use HasFactory;
    use HasUuid;

    protected $touches = [
        'project'
    ];

    protected $fillable = [
        'project_id',
        'region_id',
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
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
