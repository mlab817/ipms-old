<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueCommentStoreRequest;
use App\Http\Requests\IssueStoreRequest;
use App\Models\Issue;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectIssueController extends Controller
{
    public function index(Request $request, Project $project)
    {
        $issues = in_array($request->status, ['open','closed'])
            ? $project->issues()->where('status', $request->status)->get()
            : $project->issues;

        return view('issues.index', compact('project'))
            ->with('openIssues', Issue::where('status','open')->count())
            ->with('closedIssues', Issue::where('status','closed')->count())
            ->with('issues', $issues);
    }

    public function create(Project $project)
    {
        return view('issues.create', compact('project'));
    }

    public function store(IssueStoreRequest $request, Project $project)
    {
        $issue = $project->issues()->create($request->validated());
        $issue->created_by = auth()->id();
        $issue->save();

        return redirect()->route('projects.issues.show', [
            'project'   => $project,
            'issue'     => $issue
        ]);
    }

    public function show(Project $project, Issue $issue)
    {
        $issue = Issue::where('project_id', $project->id)
            ->where('id', $issue->id)
            ->first();

        if (! $issue) {
            abort(404, 'Issue not found under this project');
        }

        return view('issues.show', compact('issue'))
            ->with('project', $project);
    }

    public function update(Project $project, Issue $issue, IssueStoreRequest $request)
    {
        // validate existence
        $issue = Issue::where('project_id', $project->id)
            ->where('id', $issue->id)
            ->first();

        if (! $issue) {
            abort(404, 'Issue not found under this project');
        }

        $issue->update($request->validated());

        return redirect()->route('projects.issues.show', [
            'project'   => $project,
            'issue'     => $issue
        ]);
    }
}
