<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\ProjectDataTableScope;
use App\DataTables\SubprojectsDataTable;
use App\Http\Requests\SubprojectStoreRequest;
use App\Http\Requests\SubprojectUpdateRequest;
use App\Models\OperatingUnit;
use App\Models\Project;
use App\Models\Subproject;
use Illuminate\Http\Request;

class SubprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SubprojectsDataTable $dataTable
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function index(SubprojectsDataTable $dataTable, Project $project)
    {
        return $dataTable
            ->addScope(new ProjectDataTableScope($project))
            ->render('subprojects.index', [
                'pageTitle' => 'Subprojects for '. $project->title,
                'project'   => $project,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('subprojects.create', [
            'pageTitle'         => 'Add Subproject',
            'project'           => $project,
            // TODO: Filter OUs only that are selected as implementer of the Project
            // $project->implementing_agencies
            'operating_units'   => OperatingUnit::all(),
            'years'             => config('ipms.editor.years'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubprojectStoreRequest $request, Project $project)
    {
        $project->subprojects()->create($request->all());

        return redirect()->route('subprojects.index', [
            'project' => $project
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subproject  $subproject
     * @return \Illuminate\Http\Response
     */
    public function show(Subproject $subproject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subproject  $subproject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subproject $subproject)
    {
        return view('subprojects.edit', [
            'pageTitle'  => 'Edit Subproject',
            'subproject' => $subproject->load('operating_unit'),
            'years'      => config('ipms.editor.years'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubprojectUpdateRequest $request
     * @param \App\Models\Subproject $subproject
     * @return \Illuminate\Http\Response
     */
    public function update(SubprojectUpdateRequest $request, Subproject $subproject)
    {
        $subproject->update($request->all());

        return redirect()->route('subprojects.index', [
            'project' => $subproject->project,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subproject  $subproject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subproject $subproject)
    {
        $subproject->delete();

        return response()->noContent();
    }
}
