<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OperatingUnitsDataTable;
use App\Http\Controllers\Controller;
use App\Models\OperatingUnit;
use App\Models\OperatingUnitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class OperatingUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OperatingUnitsDataTable $dataTable)
    {
        return $dataTable->render('admin.operating_units.index', [
            'pageTitle' => 'Operating Units',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.operating_units.create', [
            'pageTitle' => 'Add Operating Unit',
            'operating_unit_types' => OperatingUnitType::all(),
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
            'operating_unit_type_id' => 'required',
        ]);

        $ou = OperatingUnit::create($request->all());

        if ($request->has('image')) {
            $ou
                ->addMedia($request->file('image'))
                ->toMediaCollection('logo');
        }

        Alert::success('Success', 'Successfully saved item');

        return redirect()->route('admin.operating_units.index');
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
    public function edit(OperatingUnit $operatingUnit)
    {
        return view('admin.operating_units.edit', compact('operatingUnit'))->with([
            'pageTitle' => 'Edit Operating Unit',
            'operating_unit_types' => OperatingUnitType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperatingUnit $operatingUnit)
    {
        $request->validate([
            'name' => 'required',
            'operating_unit_type_id' => 'required',
        ]);

        $operatingUnit->update($request->only(
            'name', 'operating_unit_type_id'
        ));

        try {
            $operatingUnit
                ->addMedia($request->file('image'))
                ->toMediaCollection('logo');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


        Alert::success('Success', 'Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatingUnit $operatingUnit)
    {
        $operatingUnit->delete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.operating_units.index');
    }
}
