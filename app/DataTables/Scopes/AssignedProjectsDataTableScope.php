<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class AssignedProjectsDataTableScope implements DataTableScope
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        $user = auth()->user();

        return $query->whereIn('id', $user->assigned_projects);
    }
}
