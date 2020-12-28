<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OperatingUnit extends Model
{
    use HasFactory;
    use HasUuid;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'operating_unit_type_id'
    ];

    public function offices(): HasMany
    {
        return $this->hasMany(Office::class);
    }

    public function operating_unit_type(): BelongsTo
    {
        return $this->belongsTo(OperatingUnitType::class);
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
