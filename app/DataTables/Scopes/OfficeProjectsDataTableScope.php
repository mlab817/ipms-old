<?php


namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class OfficeProjectsDataTableScope implements DataTableScope
{
    /**
     * Filter projects by the office of the user
     * Excluding PAPs that do not have office tag
     *
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|mixedF
     */
    public function apply($query)
    {
        $user = auth()->user();

        return $query
            ->whereNotNull('office_id')
            ->where('office_id', $user->office_id);
    }
}
