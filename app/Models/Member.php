<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'member_id',
        'invited_by',
    ];

    protected $casts = [
        'accepted_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'member_id');
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class,'invited_by');
    }

    public function accept()
    {
        $this->accepted_at = now();
        $this->save();
    }
}
