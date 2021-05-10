<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'download_url',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
