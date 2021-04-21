<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class OperatingUnit extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use HasUuid;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'operating_unit_type_id'
    ];

    protected $appends = [
        'project_count',
    ];

    protected $with = [
        'operating_unit_type',
    ];

    public function offices(): HasMany
    {
        return $this->hasMany(Office::class);
    }

    public function operating_unit_type(): BelongsTo
    {
        return $this->belongsTo(OperatingUnitType::class);
    }

    public function projects(): HasManyThrough
    {
        return $this->hasManyThrough(
            Project::class,
            Office::class,
            'operating_unit_id',
            'office_id',
            'id',
            'id'
        );
    }

    public function getProjectCountAttribute(): int
    {
        return $this->projects->count();
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
