<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tier extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
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
