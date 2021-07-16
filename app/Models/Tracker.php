<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'updating_period_id' ,
        'project_id',
        'pipol_status_id',
        'remarks',
        'user_id',
    ];

    public function pipol_status(): BelongsTo
    {
        return $this->belongsTo(PipolStatus::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function updating_period(): BelongsTo
    {
        return $this->belongsTo(UpdatingPeriod::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
