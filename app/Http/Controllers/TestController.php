<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    public function show(Project $project)
    {
        Inertia::render('project', [
            'project' => $project,
        ]);
    }
}
