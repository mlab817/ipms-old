<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResettlementActionPlan extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at'    => 'datetime:Y-m-d H:m:s',
        'updated_at'    => 'datetime:Y-m-d H:m:s',
        'y2016'         => 'float',
        'y2017'         => 'float',
        'y2018'         => 'float',
        'y2019'         => 'float',
        'y2020'         => 'float',
        'y2021'         => 'float',
        'y2022'         => 'float',
        'y2023'         => 'float',
        'y2024'         => 'float',
        'y2025'         => 'float',
        'affected_households'   => 'int',
    ];

    protected $touches = [
        'project'
    ];

    protected $fillable = [
        'project_id',
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
        'affected_households',
    ];

    protected $hidden = [
        'project_id'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
