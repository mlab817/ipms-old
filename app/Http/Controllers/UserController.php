<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $chart = Project::with(['submission_status','updating_period'])
            ->where('created_by', $user->id)->get();

        $chart = $chart->map(function ($item) {
                $item->updating_period = $item->updating_period->name ?? '_';
                return $item;
            })->groupBy('updating_period')
            ->map(function ($item) {
                return $item->count();
            });

        return view('users.show', compact('user'))
            ->with('chart', $chart);
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

        auth()->user()->update([
            'username' => $request->username,
        ]);

        return back()->with('message','Successfully updated username');
    }

    public function projects(User $user)
    {
        $user->load('projects');

        return view('users.show', compact('user'));
    }
}
