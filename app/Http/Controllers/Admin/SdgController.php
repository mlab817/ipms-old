<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SdgsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Sdg;
use Illuminate\Http\Request;

class SdgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SdgsDataTable $dataTable)
    {
        return $dataTable->render('admin.sdgs.index', [
            'pageTitle' => 'Sustainable Development Goals',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sdgs.create', [
            'pageTitle' => 'Add SDG',
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

        Sdg::create($request->all());

        return redirect()->route('admin.sdgs.index');
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
    public function edit(Sdg $sdg)
    {
        return view('admin.sdgs.edit', [
            'pageTitle' => 'Edit SDG',
            'sdg' => $sdg,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sdg $sdg)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sdg->update($request->all());

        return redirect()->route('admin.sdgs.index');
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
