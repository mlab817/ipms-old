<?php

namespace App\Models;

use App\Traits\HasUuid;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FundingSource extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    use HasUuid;
    use Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $appends = [
        'total_investment',
        'total_infrastructure',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function fs_investments(): HasMany
    {
        return $this->hasMany(FsInvestment::class,'fs_id','id');
    }

    public function fs_infrastructures(): HasMany
    {
        return $this->hasMany(FsInfrastructure::class,'fs_id','id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    public function investment(): HasOne
    {
        return $this->hasOne(FsInvestment::class,'fs_id')
            ->selectRaw('fs_id')
            ->selectRaw('count(id) as count')
            ->selectRaw('sum(y2016) as "y2016"')
            ->selectRaw('sum(y2017) as "y2017"')
            ->selectRaw('sum(y2018) as "y2018"')
            ->selectRaw('sum(y2019) as "y2019"')
            ->selectRaw('sum(y2020) as "y2020"')
            ->selectRaw('sum(y2021) as "y2021"')
            ->selectRaw('sum(y2022) as "y2022"')
            ->selectRaw('sum(y2023) as "y2023"')
            ->selectRaw('sum(y2024) as "y2024"')
            ->selectRaw('sum(y2025) as "y2025"')
            ->selectRaw('sum(y2016+y2017+y2018+y2019+y2020+y2021+y2022+y2023+y2024+y2025) AS total')
            ->groupBy('fs_id');
    }

    public function infrastructure(): HasOne
    {
        return $this->hasOne(FsInfrastructure::class,'fs_id')
            ->selectRaw('fs_id')
            ->selectRaw('count(id) as count')
            ->selectRaw('sum(y2016) as "y2016"')
            ->selectRaw('sum(y2017) as "y2017"')
            ->selectRaw('sum(y2018) as "y2018"')
            ->selectRaw('sum(y2019) as "y2019"')
            ->selectRaw('sum(y2020) as "y2020"')
            ->selectRaw('sum(y2021) as "y2021"')
            ->selectRaw('sum(y2022) as "y2022"')
            ->selectRaw('sum(y2023) as "y2023"')
            ->selectRaw('sum(y2024) as "y2024"')
            ->selectRaw('sum(y2025) as "y2025"')
            ->selectRaw('sum(y2016+y2017+y2018+y2019+y2020+y2021+y2022+y2023+y2024+y2025) AS total')
            ->groupBy('fs_id');
    }

    public function getTotalInvestmentAttribute(): float
    {
        return $this->investment->total ?? 0;
    }

    public function getTotalInfrastructureAttribute(): float
    {
        return $this->infrastructure->total ?? 0;
    }

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
