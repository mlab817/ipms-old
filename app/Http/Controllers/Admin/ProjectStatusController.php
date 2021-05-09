<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectStatusesDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;

class ProjectStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectStatusesDataTable $dataTable)
    {
        return $dataTable->render('admin.project_statuses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project_statuses.create', [
            'pageTitle' => 'Add Project Status'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        ProjectStatus::create($request->all());

        return redirect()->route('admin.project_statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectStatus $projectStatus)
    {
        return view('admin.project_statuses.edit', [
            'pageTitle' => 'Edit Project Status',
            'project_status' => $projectStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectStatus $projectStatus)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $projectStatus->update($request->all());

        return redirect()->route('admin.project_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectStatus $projectStatus)
    {
        $projectStatus->delete();

        return response()->noContent();
    }
}
