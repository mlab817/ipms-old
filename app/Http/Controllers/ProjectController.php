<?php

namespace App\Http\Controllers;

use App\Models\Basis;
use App\Models\PapType;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $q = $request->query('q');
        $per_page = $request->query('per_page') ?? 10;

        if ($q) {
            $projects = Project::search($q)->paginate($per_page);
        } else {
            $projects = Project::paginate($per_page);
        }

        $projects->load(['pap_type','creator']);

        return view('projects.index', compact('projects'))
            ->with('per_page', $per_page)
            ->with('q', $q);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create()
    {
        $project = new Project;

        return view('projects.form', compact('project'))
            ->with('pap_types', PapType::select('id AS value','name AS label')->get())
            ->with('bases', Basis::select('id AS value','name AS label')->get());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return back();
    }
}
