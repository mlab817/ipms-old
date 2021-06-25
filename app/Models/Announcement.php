<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'expires_at',
        'user_id',
    ];

    protected $dates = [
        'expires_at',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->id() ?? null;
        });
    }

    public function isExpired()
    {
        return $this->expires_at < Carbon::now();
    }

    public function latest()
    {
        return $this->orderByDesc('created_at')->first();
    }
}
