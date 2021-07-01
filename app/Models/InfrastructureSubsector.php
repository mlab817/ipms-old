<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfrastructureSubsector extends Model
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'uuid',
        'slug',
        'description',
        'infrastructure_sector_id',
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
