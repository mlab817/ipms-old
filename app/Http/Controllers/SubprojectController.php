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
    public function __construct()
    {
        $this->authorizeResource(Subproject::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @param SubprojectsDataTable $dataTable
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function index(SubprojectsDataTable $dataTable)
    {
        return $dataTable
            ->render('subprojects.index', [
                'pageTitle' => 'Subprojects',
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subprojects.create', [
            'pageTitle'         => 'Add Subproject',
            'operating_units'   => OperatingUnit::all(),
            'years'             => config('ipms.editor.years'),
            // TODO: This can be scoped
            'projects'          => Project::hasSubprojects()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubprojectStoreRequest $request)
    {
        Subproject::create($request->all());

        return redirect()->route('subprojects.index');
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
