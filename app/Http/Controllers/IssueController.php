<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(Project $project)
    {
        return view('issues.index', compact('project'));
    }

    public function create(Project $project)
    {
        return view('issues.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $project->issues()->create($request->only('title','description'));

        return redirect()->route('projects.show', $project);
    }
}
