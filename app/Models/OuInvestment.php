<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OuInvestment extends Model
{
    use HasFactory;

    protected $touches = [
        'project'
    ];

    protected $fillable = [
        'project_id',
        'ou_id',
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

    public function operating_unit(): BelongsTo
    {
        return $this->belongsTo(OperatingUnit::class,'ou_id','id');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
