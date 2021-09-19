<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserBaseProjectController extends Controller
{
    public function index(User $user)
    {
        // return users base projects
        return view('users.base-projects.index', [
            'user'          => $user,
            'baseProjects'  => $user->owned_base_projects
        ]);
    }
}
