<?php

namespace App\Traits;

use App\Filters\QueryFilters;
use Illuminate\Database\Query\Builder;

trait Filterable
{
    /**
     * @param $query
     * @param QueryFilters $filters
     *
     * @return Builder
     */
    public function scopeFilter($query, QueryFilters $filters): Builder
    {
        return $filters->apply($query);
    }
}
