<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class TripsDataTableScope implements DataTableScope
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
         return $query->where('has_infra', 1);
    }
}
