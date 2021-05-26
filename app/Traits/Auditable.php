<?php

namespace App\Traits;

use App\Events\AuditLogEvent;
use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

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
        $auditLog = $model->audit_logs()->create([
            'description'  => $description,
            'user_id'      => auth()->id() ?? null,
            'original'     => $model->getOriginal() ?? null,
            'modified'     => $model->getChanges() ?? null,
            'host'         => request()->ip() ?? null,
        ]);

        $modelName = Str::replace('_', ' ', $model->getTable());
        $userName = auth()->user()->name;
        $label = $model->slug ? Str::replace('-',' ', $model->slug) : '';

        $message = "{$userName} {$description} {$modelName}: {$label}.";

        event(new AuditLogEvent($message, 'System Message'));
    }

    public function audit_logs(): MorphMany
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }
}
