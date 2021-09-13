<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->q;

        $users = User::where('first_name', 'like', '%' . $q . '%')
            ->orWhere('last_name', 'like', '%' . $q . '%')
            ->orWhere('email', 'like', '%' . $q . '%')
            ->orWhere('username', 'like', '%' . $q . '%')
            ->get();

        return response()->view('users.list', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'))
            ->with('chart', collect([]));
    }

    public function update(Request $request, User $user)
    {
        // TODO: Update user
    }

    public function upload_avatar(Request $request, User $user)
    {
        $request->validate([
            'avatar' => 'required|image|max:2048'
        ]);

        $avatar = Storage::disk('public')->put('avatars', $request->file('avatar'));

        $user->avatar = $avatar;
        $user->save();

        return back()
            ->with('message','Successfully uploaded avatar');
    }

    public function update_name(Request $request, User $user)
    {
        if (! $user->id == auth()->id()) {
            return back()->with('error','Cannot edit other users');
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
        ]);

        return back()->with('message','Successfully updated name');
    }

    public function update_username(Request $request, User $user)
    {
        if (! $user->id == auth()->id()) {
            return back()->with('error','Cannot edit other users');
        }

        $request->validate([
            'username' => 'required|unique:users,username,'. $user->id,
        ]);

        $user = auth()->user();
        $user->username = $request->username;
        $user->save();

        return redirect()->route('users.show', $user)->with('message','Successfully updated username');
    }

    public function projects(Request $request, User $user)
    {
        $user->load('projects');

        $q = $request->query('q')
            ? $request->query('q')
            : null;

        $projects = $user->owned_base_projects;

        if ($q) {
            $projects = $user->projects()->where('title','like','%' . $q . '%')->get();
        }

        return view('users.projects', compact('user'))
            ->with('projects', $projects);
    }

    public function follow(User $user)
    {
        $auth = auth()->user();

        $auth->isFollowing($user->id)
            ? $auth->unfollow($user->id)
            : $auth->follow($user);

        return back();
    }

    public function settings(Request $request, User $user)
    {
        return view('users.settings', compact('user'));
    }
}
