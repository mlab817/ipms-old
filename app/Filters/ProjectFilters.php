<?php

namespace App\Filters;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectFilters extends QueryFilters
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        parent::__construct($request);
    }

    public function id($id)
    {
        return $this->builder->where('projects.id','=',$id);
    }
}
