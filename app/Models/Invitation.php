<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'invitation_token',
        'registered_at',
    ];

    public function generateInvitationToken() {
        $this->invitation_token = substr(md5(rand(0, 9) . $this->email . time()), 0, 32);
    }

    public function office(): BelongsTo
    {
        return $this->belongsTo(Office::class);
    }

    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class,'invited_by');
    }
}
