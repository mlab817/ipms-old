<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubmissionStatus extends Model
{
    use HasFactory;

    const DRAFT     = 'Draft';
    const ENDORSED  = 'Endorsed';
    const DROPPED   = 'Dropped';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $hidden = [
        'slug',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public static function findByName(string $name)
    {
        return static::where('name', $name)->first();
    }
}
