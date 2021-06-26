<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PapTypesDataTable;
use App\Http\Controllers\Controller;
use App\Models\PapType;
use Illuminate\Http\Request;


class PapTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PapTypesDataTable $dataTable)
    {
        return $dataTable->render('admin.pap_types.index', [
            'pageTitle' => 'PAP Types',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pap_types.create', [
            'pageTitle' => 'Add PAP Type',
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

        $papType = PapType::create($request->all());

        Alert::success('Success', 'Successfully saved item');

        return redirect()->route('admin.pap_types.index');
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
    public function edit(PapType $papType)
    {
        return view('admin.pap_types.edit', compact('papType'))->with([
            'pageTitle' => 'Edit PAP Type',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PapType $papType)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $papType->update($request->all());

        Alert::success('Success', 'Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PapType $papType)
    {
        $papType->delete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.pap_types.index');
    }
}
