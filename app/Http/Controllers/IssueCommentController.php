<?php

namespace App\Http\Controllers;

use App\Http\Requests\IssueCommentStoreRequest;
use App\Models\Issue;
use Illuminate\Http\Request;

class IssueCommentController extends Controller
{
    public function store(IssueCommentStoreRequest $request, Issue $issue)
    {
        $issue_comment = $issue->issue_comments()->create($request->validated());

        if ($request->has('comment_and_close')) {
            $issue->close();

            $issue_comment->action = 'close';
            $issue_comment->save();
        }

        if ($request->has('comment_and_reopen')) {
            $issue->reopen();
            $issue_comment->action = 'reopen';
            $issue_comment->save();
        }

        return back();
    }
}
