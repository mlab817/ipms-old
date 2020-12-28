<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    use HasUuid;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'contact_numbers',
        'office_head_name',
        'office_head_position'
    ];

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
