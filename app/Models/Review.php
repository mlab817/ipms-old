<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;
    use HasUuid;
    use Auditable;

    protected $guarded = [];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function getRouteKey(): string
    {
        return $this->uuid;
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function readiness_level(): BelongsTo
    {
        return $this->belongsTo(ReadinessLevel::class);
    }

    public function pip_typology(): BelongsTo
    {
        return $this->belongsTo(PipTypology::class);
    }

    public function cip_type(): BelongsTo
    {
        return $this->belongsTo(CipType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
