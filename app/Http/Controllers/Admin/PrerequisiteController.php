<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PrerequisitesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Prerequisite;
use Illuminate\Http\Request;

class PrerequisiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PrerequisitesDataTable $dataTable)
    {
        return $dataTable->render('admin.prerequisites.index', [
            'pageTitle' => 'Prerequisites',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prerequisites.create', [
            'pageTitle' => 'Add Prerequisite'
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
        $request->validate([
            'name' => 'required'
        ]);

        Prerequisite::create($request->all());

        return redirect()->route('admin.prerequisites.index');
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
    public function edit(Prerequisite $prerequisite)
    {
        return view('admin.prerequisites.edit', [
            'pageTitle' => 'Edit Prerequisite',
            'prerequisite' => $prerequisite
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prerequisite $prerequisite)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $prerequisite->update($request->all());

        return redirect()->route('admin.prerequisites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prerequisite $prerequisite)
    {
        $prerequisite->delete();

        return response()->noContent();
    }
}
