<?php

namespace App\Http\Controllers;

use App\DataTables\ReadinessLevelsDataTable;
use App\Models\ReadinessLevel;
use Illuminate\Http\Request;

class ReadinessLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReadinessLevelsDataTable $dataTable)
    {
        return $dataTable->render('admin.readiness_levels.index', [
            'pageTitle' => 'Readiness Levels',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.readiness_levels.create', [
            'pageTitle' => 'Add Readiness Level',
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
            'name' => 'required',
        ]);

        ReadinessLevel::create($request->all());

        return redirect()->route('admin.readiness_levels.index');
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
    public function edit(ReadinessLevel $readinessLevel)
    {
        return view('admin.readiness_levels.edit', [
            'pageTitle' => 'Edit Readiness Level',
            'readiness_level' => $readinessLevel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReadinessLevel $readinessLevel)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $readinessLevel->update($request->all());

        return redirect()->route('admin.readiness_levels.index');
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
