<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegionInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'region_id',
        't2016',
        't2017',
        't2018',
        't2019',
        't2020',
        't2021',
        't2022',
        't2023',
        't2024',
        't2025',
        'i2016',
        'i2017',
        'i2018',
        'i2019',
        'i2020',
        'i2021',
        'i2022',
        'i2023',
        'i2024',
        'i2025',
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
