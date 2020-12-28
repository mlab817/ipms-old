<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sdg extends Model
{
    use HasFactory;
    use HasUuid;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(Region::class);
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
