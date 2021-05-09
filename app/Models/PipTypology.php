<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PipTypology extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'description',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }


    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }
}
