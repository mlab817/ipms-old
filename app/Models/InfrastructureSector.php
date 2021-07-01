<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfrastructureSector extends Model
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'uuid',
        'description',
    ];

    protected $hidden = [
        'description',
        'slug',
        'infrastructure_sector_id',
        'updated_at',
        'created_at',
        'deleted_at',
        'pivot'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function children(): HasMany
    {
        return $this->hasMany(InfrastructureSubsector::class);
    }

    public function infrastructure_subsectors(): HasMany
    {
        return $this->hasMany(InfrastructureSubsector::class);
    }

    public function projects(): HasManyThrough
    {
        return $this->hasManyThrough(Project::class, InfrastructureSubsector::class);
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
