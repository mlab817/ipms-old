<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectUserStoreRequest;
use App\Http\Requests\ProjectUserUpdateRequest;
use App\Models\Project;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectUserController extends Controller
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function index(Project $project)
    {
        return view('admin.projects.users.index', [
            'pageTitle' => 'Manage Access: ' . $project->title,
            'project' => $project,
            'users' => $project->users
        ]);
    }

    public function create(Project $project)
    {
        $removeUser = $project->users;
        $removeUser->push($project->creator);

//        $users = User::select('id','name')->whereNotIn('id', $removeUser->pluck('id')->toArray())->get();

        $roles = Role::with(['users' => function($query) use ($removeUser) {
            $query->with('office')->whereNotIn('id', $removeUser->pluck('id')->toArray());
        }])->get();

        return view('admin.projects.users.create', [
//            'users' => $users,
            'project' => $project->load('office','creator'),
            'roles' => $roles,
        ]);
    }

    public function store(ProjectUserStoreRequest $request, Project $project)
    {
        // TODO: This does not trigger AuditLog
        $project->users()->attach($request->user_id, [
            'read' => $request->read ?? 0,
            'update' => $request->update ?? 0,
            'delete' => $request->delete ?? 0,
            'review' => $request->review ?? 0,
            'comment' => $request->comment ?? 0,
        ]);

        Alert::success('Success','Successfully added user access to project');

        return redirect()->route('admin.projects.users.index', $project->getRouteKey());
    }

    public function show()
    {

    }

    public function edit(Project $project, User $user)
    {
        $user = $project->users->find($user->id);

        return view('admin.projects.users.edit', [
            'project' => $project,
            'user' => $user,
            'pageTitle' => 'Edit User Access to Project',
        ]);
    }

    public function update(ProjectUserUpdateRequest $request, Project $project, User $user)
    {
        $project->users()->updateExistingPivot($user->id, [
            'read'      => $request->read,
            'update'    => $request->update,
            'delete'    => $request->delete,
            'review'    => $request->review,
            'comment'   => $request->comment,
        ]);

        Alert::success('Success','Successfully updated user access to project');

        return redirect()->route('admin.projects.users.index', [
            'project' => $project,
        ]);
    }

    public function destroy(Project $project, User $user)
    {
        $project->users()->detach($user->id);

        return redirect()->route('admin.projects.users.index', [
            'project' => $project,
        ]);
    }
}
