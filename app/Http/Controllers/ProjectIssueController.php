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
            : $project->issues()->where('status', 'open')->get();

        return view('projects.issues.index', compact('project'))
            ->with('baseProject', $project->base_project)
            ->with('openIssues', $project->issues()->where('status','open')->count())
            ->with('closedIssues', $project->issues()->where('status','closed')->count())
            ->with('issues', $issues);
    }

    public function create(Project $project)
    {
        return view('projects.issues.create', compact('project'))
            ->with('baseProject', $project->base_project);
    }

    public function store(IssueStoreRequest $request, Project $project)
    {
        $issue = $project->issues()->create($request->validated());
        $issue->created_by = auth()->id();
        $issue->save();

        return redirect()->route('projects.issues.show', [
            'baseProject'   => $project->base_project,
            'project'       => $project,
            'issue'         => $issue
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

        return view('projects.issues.show', compact('issue'))
            ->with([
                'baseProject'   => $project->base_project,
                'project'       => $project
            ]);
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
            'baseProject'   => $project->base_project,
            'project'       => $project,
            'issue'         => $issue
        ]);
    }
}
