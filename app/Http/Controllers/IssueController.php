<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Hamcrest\Core\Is;
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

    public function show(Issue $issue)
    {
        return view('issues.show', compact('issue'))
            ->with('project', $issue->project);
    }

    public function edit(Issue $issue)
    {

    }

    public function update(Request $request, Issue $issue)
    {

    }

    public function close()
    {

    }


}
