<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reason extends Model
{
    use HasFactory;

    const REASONS = [
        'Not PIP',
        'Subsumed',
        'Changed/Replaced',
        'Not Funded',
        'Duplicated',
        'Other',
    ];

    protected $fillable = [
        'name',
    ];

    public function pipols(): HasMany
    {
        return $this->hasMany(Pipol::class);
    }
}
