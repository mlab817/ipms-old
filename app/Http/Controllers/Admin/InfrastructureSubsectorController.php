<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InfrastructureSubsectorsDataTable;
use App\Http\Controllers\Controller;
use App\Models\InfrastructureSector;
use App\Models\InfrastructureSubsector;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        Alert::success('Success', 'Successfully saved item');

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
        return view('admin.infrastructure_subsectors.edit', compact('infrastructureSubsector'))->with([
            'pageTitle' => 'Edit Infrastructure Subsector',
            'infrastructure_sectors' => InfrastructureSector::all(),
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

        Alert::success('Success', 'Successfully updated item');

        return back();
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

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.infrastructure_subsectors.index');
    }
}
