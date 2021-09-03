<?php

namespace App\Traits;

trait HasUuid
{
    protected static function bootHasUuid()
    {
        static::creating(function ($model) {
            $model->uuid = nanoid();
        });

        static::saving(function ($model) {
            if (! $model->uuid) {
                $model->uuid = nanoid();
            }
        });
    }
}
