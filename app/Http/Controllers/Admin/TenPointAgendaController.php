<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TenPointAgendasDataTable;
use App\Http\Controllers\Controller;
use App\Models\TenPointAgenda;
use Illuminate\Http\Request;

class TenPointAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TenPointAgendasDataTable $dataTable)
    {
        return $dataTable->render('admin.ten_point_agendas.index', [
            'pageTitle' => 'Ten Point Agenda',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ten_point_agendas.create', [
            'pageTitle' => 'Add Ten Point Agenda',
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

        TenPointAgenda::create($request->all());

        return redirect()->route('admin.ten_point_agendas.index');
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
    public function edit(TenPointAgenda $tenPointAgenda)
    {
        return view('admin.ten_point_agendas.edit', [
            'pageTitle' => 'Edit Ten Point Agenda',
            'ten_point_agenda' => $tenPointAgenda
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenPointAgenda $tenPointAgenda)
    {
        $tenPointAgenda->update($request->all());

        return redirect()->route('admin.ten_point_agendas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenPointAgenda $tenPointAgenda)
    {
        $tenPointAgenda->delete();
    }
}
