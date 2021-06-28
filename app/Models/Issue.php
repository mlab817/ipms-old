<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use HasFactory;
    use SoftDeletes;

    const STATUS = [
        'open'      => 'Open',
        'closed'    => 'Closed'
    ];

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'created_by',
        'status',
    ];

    public static function booted()
    {
        static::creating(function ($model) {
            $model->created_by  = auth()->id() ?? 1;
            $model->status      = 'open';
        });
    }

    public function issue_comments(): HasMany
    {
        return $this->hasMany(IssueComment::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function close()
    {
        $this->status = 'closed';
        $this->save();
    }

    public function reopen()
    {
        $this->status = 'open';
        $this->save();
    }

    public function scopeOpen($query)
    {
        return $query->where('status','open');
    }

    public function scopeClosed($query)
    {
        return $query->where('status','closed');
    }
}
