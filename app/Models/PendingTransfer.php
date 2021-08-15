<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PendingTransfer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'from',
        'to',
        'remarks',
        'completed',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function transferred_by(): BelongsTo
    {
        return $this->belongsTo(User::class,'from');
    }

    public function transferred_to(): BelongsTo
    {
        return $this->belongsTo(User::class,'to');
    }

    public function scopeOwned($query)
    {
        return $query->where('from', auth()->id())
            ->orWhere('to', auth()->id());
    }
}
