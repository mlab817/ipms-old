<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'base_project_id'   => 'required|exists:base_projects,id',
            'collaborator_id'   => 'required|exists:users,id',
        ]);

        Collaborator::create($request->all('base_project_id','collaborator_id'));

        return back();
    }

    public function accept(Request $request)
    {
        $token = $request->token;
    }

    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();

        return back();
    }
}
