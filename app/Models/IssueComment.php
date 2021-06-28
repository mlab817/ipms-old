<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueComment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'issue_id',
        'comment',
        'action',
        'created_by',
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->created_by = auth()->id();
        });
    }

    public function issue(): BelongsTo
    {
        return $this->belongsTo(Issue::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
