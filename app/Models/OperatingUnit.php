<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class OperatingUnit extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;
    use HasMediaTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'operating_unit_type_id'
    ];

    protected $appends = [
        'project_count',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    public function getImageAttribute(): string
    {
        return $this->getFirstMediaUrl();
    }

    public function getThumbAttribute(): string
    {
        $media = $this->getFirstMedia('logo');

        if ($media) {
            return $media->getFullUrl('thumb');
        }

        return '';

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(40)
            ->height(40)
            ->sharpen(10);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('logo')
            ->singleFile();
    }
}
