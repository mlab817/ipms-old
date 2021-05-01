<?php

namespace App\Http\Controllers;

use App\DataTables\GadsDataTable;
use App\Models\Gad;
use Illuminate\Http\Request;

class GadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GadsDataTable $dataTable)
    {
        return $dataTable->render('admin.gads.index', [
            'pageTitle' => 'Gender & Development Classification',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gads.create', [
            'pageTitle' => 'Add GAD Classification',
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

        Gad::create($request->all());

        return redirect()->route('admin.gads.index');
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
    public function edit(Gad $gad)
    {
        return view('admin.gads.edit', [
            'pageTitle' => 'Edit GAD Classification',
            'gad' => $gad,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gad $gad)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $gad->update($request->all());

        return redirect()->route('admin.gads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gad $gad)
    {
        $gad->delete();

        return response()->noContent();
    }
}
