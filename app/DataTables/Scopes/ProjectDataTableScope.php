<?php


namespace App\DataTables\Scopes;

use App\Models\Project;
use Yajra\DataTables\Contracts\DataTableScope;

class ProjectDataTableScope implements DataTableScope
{
    protected $project;

    /**
     * ProjectDataTableScope constructor.
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $query->where('project_id', $this->project->id);
    }
}
