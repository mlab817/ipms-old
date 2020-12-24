<?php

namespace App\Models;

use App\Traits\Trackable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use Sluggable;
    use Trackable;

    protected $fillable = [

    ];

    public function getPermissionsAttribute(): array
    {
        return [
            'view'          => auth()->user()->can('view', $this),
            'update'        => auth()->user()->can('update', $this),
            'delete'        => auth()->user()->can('delete', $this),
            'restore'       => auth()->user()->can('restore', $this),
            'force-delete'  => auth()->user()->can('force-delete', $this),
        ];
    }

    // relationships

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }
}
