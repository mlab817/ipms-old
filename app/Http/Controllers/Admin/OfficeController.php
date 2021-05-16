<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OfficesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\OfficeStoreRequest;
use App\Models\Office;
use App\Models\OperatingUnit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfficesDataTable $dataTable)
    {
        return $dataTable->render('admin.offices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.offices.create', [
           'operating_units' => OperatingUnit::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeStoreRequest $request)
    {
        $office = Office::create($request->all());

        Alert::success('Success','Successfully saved item');

        return redirect()->route('admin.offices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('admin.offices.edit', compact('office'))->with([
            'operating_units' => OperatingUnit::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeStoreRequest $request, Office $office)
    {
        $office->update($request->all());

        Alert::success('Success','Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office->delete();

        Alert::success('Success','Successfully deleted item');

        return redirect()->route('admin.offices.index');
    }
}
