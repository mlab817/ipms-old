<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = [
        'title',
        'description',
        'url',
        'public',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
