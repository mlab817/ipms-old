<?php

namespace App\DataTables\Scopes;

use App\Models\Project;
use Yajra\DataTables\Contracts\DataTableScope;

class ProjectsDataTableScope implements DataTableScope
{
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
         return $query->where('pap_type_id', Project::PROJECT);
    }
}
