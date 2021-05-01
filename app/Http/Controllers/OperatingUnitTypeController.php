<?php

namespace App\Http\Controllers;

use App\DataTables\OperatingUnitTypesDataTable;
use App\Models\OperatingUnitType;
use Illuminate\Http\Request;

class OperatingUnitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OperatingUnitTypesDataTable $dataTable)
    {
        return $dataTable->render('admin.operating_unit_types.index', [
            'pageTitle' => 'Operating Unit Types',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operating_unit_types.create', [
            'pageTitle' => 'Add OU Type',
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

        OperatingUnitType::create($request->all());

        return redirect()->route('admin.operating_unit_types.index');
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
    public function edit(OperatingUnitType $operatingUnitType)
    {
        return view('admin.operating_unit_types.edit', [
            'pageTitle' => 'Edit OU Type',
            'operating_unit_type' => $operatingUnitType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperatingUnitType $operatingUnitType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $operatingUnitType->update($request->all());

        return redirect()->route('admin.operating_unit_types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatingUnitType $operatingUnitType)
    {
        $operatingUnitType->delete();

        return response()->noContent();
    }
}
