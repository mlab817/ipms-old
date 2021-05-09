<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PipTypologiesDataTable;
use App\Http\Controllers\Controller;
use App\Models\PipTypology;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PipTypologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PipTypologiesDataTable $dataTable)
    {
        return $dataTable->render('admin.pip_typologies.index', [
            'pageTitle' => 'PIP Typologies',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pip_typologies.create', [
            'pageTitle' => 'Add PIP Typology',
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

        $pipTypology = PipTypology::create($request->all());

        Alert::success('Success', 'Successfully saved item');

        return redirect()->route('admin.pip_typologies.index');
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
    public function edit(PipTypology $pipTypology)
    {
        return view('admin.pip_typologies.edit', compact('pipTypology'))->with([
            'pageTitle' => 'Add PIP Typology',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PipTypology $pipTypology)
    {
        $request->validate(['name' => 'required']);

        Alert::success('Success', 'Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PipTypology $pipTypology)
    {
        $pipTypology->delete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.pip_typologies.index');
    }
}
