<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Project;
use Hamcrest\Core\Is;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(Request $request, Project $project)
    {
        $project->load('creator','issues.issue_comments');

        $status = $request->has('status')
            ? $request->status
            : 'open';

        if ($request->q) {
            $issues = $project->issues()->where('title','LIKE','%'.$request->q.'%')->get();
        } else {
            $issues = $project->issues->where('status',$status);
        }

        return view('issues.index', compact('project'))
            ->with('issues', $issues)
            ->with('openIssues', $project->issues->where('status','open')->count())
            ->with('closedIssues', $project->issues->where('status','closed')->count());
    }

    public function create(Project $project)
    {
        return view('issues.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $project->issues()->create($request->only('title','description'));

        return redirect()->route('projects.issues.index', $project);
    }

    public function show(Issue $issue)
    {
        $issue->load('issue_comments','creator');

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
