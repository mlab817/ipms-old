<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeasibilityStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'fs_status_id',
        'needs_assistance',
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

    public function fs_status(): BelongsTo
    {
        return $this->belongsTo(FsStatus::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
