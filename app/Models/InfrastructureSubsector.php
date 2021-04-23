<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InfrastructureSubsector extends Model
{
    use HasFactory;
    use HasUuid;
//    use Sluggable;

    protected $fillable = [
        'name',
        'uuid',
        'slug',
        'description',
        'infrastructure_sector_id',
    ];

    public function infrastructure_sector(): BelongsTo
    {
        return $this->belongsTo(InfrastructureSector::class);
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
