<?php

namespace App\Http\Controllers;

use App\DataTables\InfrastructureSectorsDataTable;
use App\Models\InfrastructureSector;
use Illuminate\Http\Request;

class InfrastructureSectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InfrastructureSectorsDataTable $dataTable)
    {
        return $dataTable->render('admin.infrastructure_sectors.index', [
            'pageTitle' => 'Infrastructure Sector',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infrastructure_sectors.create', [
           'pageTitle' => 'Add Infrastructure Sector'
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

        InfrastructureSector::create($request->all());

        return redirect()->route('admin.infrastructure_sectors.index');
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
    public function edit(InfrastructureSector $infrastructureSector)
    {
        return view('admin.infrastructure_sectors.edit', [
            'pageTitle' => 'Edit Infrastructure Sector',
            'infrastructure_sector' => $infrastructureSector,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfrastructureSector $infrastructureSector)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $infrastructureSector->update($request->all());

        return redirect()->route('admin.infrastructure_sectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfrastructureSector $infrastructureSector)
    {
        $infrastructureSector->delete();

        return response()->noContent();
    }
}
