<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Trackable
{
    public static function bootTrackable()
    {

        static::creating(function ($model) {
            $userId = auth()->user()->id ?? null;
            $model->created_by = $userId;
        });

        static::updating(function ($model) {
            $userId = auth()->user()->id ?? null;

            $model->updated_by = $userId;
        });

        static::deleting(function ($model) {
            $userId = auth()->user()->id ?? null;

            $model->deleted_by = $userId;
        });
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deleter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
