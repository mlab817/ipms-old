<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InfrastructureSubsectorsDataTable;
use App\Http\Controllers\Controller;
use App\Models\InfrastructureSector;
use App\Models\InfrastructureSubsector;
use Illuminate\Http\Request;

class InfrastructureSubsectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InfrastructureSubsectorsDataTable $dataTable)
    {
        return $dataTable->render('admin.infrastructure_subsectors.index', [
            'pageTitle' => 'Infrastructure Subsectors',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infrastructure_subsectors.create', [
            'pageTitle' => 'Add Infrastructure Subsector',
            'infrastructure_sectors' => InfrastructureSector::all(),
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
            'infrastructure_sector_id' => 'required',
        ]);

        InfrastructureSubsector::create($request->all());

        return redirect()->route('admin.infrastructure_subsectors.index');
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
    public function edit(InfrastructureSubsector $infrastructureSubsector)
    {
        return view('admin.infrastructure_subsectors.edit', [
            'pageTitle' => 'Edit Infrastructure Subsector',
            'infrastructure_sectors' => InfrastructureSector::all(),
            'infrastructure_subsector' => $infrastructureSubsector,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfrastructureSubsector $infrastructureSubsector)
    {
        $request->validate([
            'name' => 'required',
            'infrastructure_sector_id' => 'required',
        ]);

        $infrastructureSubsector->update($request->all());

        return redirect()->route('admin.infrastructure_subsectors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfrastructureSubsector $infrastructureSubsector)
    {
        $infrastructureSubsector->delete();

        return response()->noContent();
    }
}
