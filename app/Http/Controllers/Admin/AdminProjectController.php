<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProjectOwnerChangedEvent;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Project::query()->with(['users','creator','office','project_status']);

        if ($request->has('search')) {
            $searchTerm = '%' .  $request->query('search') . '%';
            $orderBy = $request->query('orderBy') ?? 'id';
            $sortOrder = $request->query('sortOrder') ?? 'ASC';

            if (! $searchTerm) {
                $query
                    ->orderBy($orderBy, $sortOrder);
            } else {
                $query
                    ->where('title','like', $searchTerm)
                    ->orderBy($orderBy, $sortOrder);
            }
        }

        $projects = $query->paginate();

        return view('admin.projects.index2', compact('projects'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // specific users that has access to the project
        $project->load('users');

        return view('admin.projects.show', [
            'project' => $project,
            'pageTitle' => 'Manage Project',
        ]);
    }

    public function changeOwner(Project $project)
    {
        return view('admin.projects.change-owner', compact('project'))
            ->with([
                'users' => User::where('id','<>', $project->created_by)->select('id','name')->get(),
            ]);
    }

    public function changeOwnerPost(Request $request, Project $project)
    {
        $originalCreator = User::find($project->created_by);

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $newOwner = User::find($request->user_id);

        // update the project
        $project->created_by    = $newOwner->id;
//        $project->office_id     = $newOwner->office_id;
        $project->save();

        $users = collect([$originalCreator, $newOwner]);

        // notify old and new
        event(new ProjectOwnerChangedEvent($project, $users));

        Alert::success('Success','Successfully changed owner of project');

        return back();
    }
}
