<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionStatus extends Model
{
    use HasFactory;

    const DRAFT     = 'Draft';
    const ENDORSED  = 'Endorsed';
    const DROPPED   = 'Dropped';

    protected $fillable = [
        'name',
    ];

    public static function findByName(string $name)
    {
        return static::where('name', $name)->first();
    }
}
