<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
  protected static function bootHasSlug()
  {
    static::created(function ($model) {
      $model->slug = Str::slug($model->name);
    });

    static::updated(function($model) {
      $model->slug = Str::slug($model->name);
    });
  }
}
