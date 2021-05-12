<?php

namespace App\Traits;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Auditable
{
    public static function bootAuditable()
    {
        static::created(function (Model $model) {
            self::audit('created', $model);
        });

        static::updated(function (Model $model) {
            self::audit('updated', $model);
        });

        static::deleted(function (Model $model) {
            self::audit('deleted', $model);
        });
    }

    protected static function audit($description, $model)
    {
        $model->audit_logs()->create([
            'description'  => $description,
//            'subject_id'   => $model->id ?? null,
//            'subject_type' => get_class($model) ?? null,
            'user_id'      => auth()->id() ?? null,
            'properties'   => $model->getChanges() ?? null,
            'host'         => request()->ip() ?? null,
        ]);
    }

    public function audit_logs(): MorphMany
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }
}
