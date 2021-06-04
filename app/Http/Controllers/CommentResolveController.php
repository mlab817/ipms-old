<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CommentResolveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Comment $comment)
    {
        abort_if(! auth()->user()->hasPermissionTo('projects.validate'), 403, 'You do not have permission to validate project');

        $comment->resolve();

        Alert::success('Success', 'Successfully resolved comment');

        return back();
    }
}
