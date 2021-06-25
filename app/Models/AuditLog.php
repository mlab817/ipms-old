<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    use HasFactory;

    public $table = 'audit_logs';

    protected $fillable = [
        'description',
        'subject_id',
        'subject_type',
        'user_id',
//        'properties',
        'original',
        'modified',
        'host',
    ];

    protected $casts = [
        'original' => 'collection',
        'modified' => 'collection',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function auditable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::query()->where(function($q) use ($query) {
                $q->where('description', 'LIKE', '%'. $query . '%')
                    ->orWhere('auditable_type', 'LIKE', '%'. $query . '%')
                    ->orWhere('host', 'LIKE', '%'. $query . '%');
            });
    }
}
