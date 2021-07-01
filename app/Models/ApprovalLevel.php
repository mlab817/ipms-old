<?php

namespace App\Models;

use App\Traits\Auditable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovalLevel extends Model
{
    use HasFactory;
    use Sluggable;
    use Auditable;
    use SoftDeletes;

    protected $guarded = [];

    protected $rules = [];

    protected $hidden = ['created_at','updated_at','deleted_at','slug','description','pivot'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
      return [
        'slug' => [
          'source' => 'name'
        ]
      ];
    }
}
