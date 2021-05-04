<?php

namespace App\Http\Controllers;

use App\DataTables\AdminProjectsDataTable;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminProjectsDataTable $dataTable)
    {
        return $dataTable->render('admin.projects.index', [
            'pageTitle' => 'Manage Projects',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // specific users that has access to the project
        $project->load('users');

        return view('admin.projects.show', [
            'project' => $project,
            'pageTitle' => 'Manage Project',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @param $userId
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
