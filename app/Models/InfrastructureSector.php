<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class InfrastructureSector extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use HasUuid;
//    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'uuid',
        'description',
    ];

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
