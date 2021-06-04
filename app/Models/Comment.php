<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    use Auditable;

    protected $fillable = [
        'project_id',
        'user_id',
        'comment',
        'response',
        'is_resolved',
        'responder_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function responder(): BelongsTo
    {
        return $this->belongsTo(User::class,'responder_id');
    }

    public function resolve()
    {
        $this->is_resolved = true;
        $this->save();
    }
}
