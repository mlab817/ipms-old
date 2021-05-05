<?php

namespace App\Http\Controllers;

use App\DataTables\BasesDataTable;
use App\Http\Requests\BasisStoreRequest;
use App\Http\Requests\BasisUpdateRequest;
use App\Models\Basis;
use Illuminate\Http\Request;

class BasisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BasesDataTable $dataTable)
    {
        return $dataTable->render('admin.bases.index', [
            'pageTitle' => 'Basis for Implementation',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bases.form', [
            'pageTitle' => 'Create Implementation Basis',
            'basis'     => new Basis,
            'route'     => route('admin.bases.store'),
            'method'    => 'POST',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BasisStoreRequest $request)
    {
        Basis::create($request->all());

        return redirect()->route('admin.bases.index');
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
    public function edit(Basis $basis)
    {
        return view('admin.bases.form', [
            'pageTitle' => 'Edit Implementation Basis',
            'basis'     => $basis,
            'route'     => route('admin.bases.update', $basis->slug),
            'method'    => 'PUT',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BasisUpdateRequest $request
     * @param Basis $basis
     * @return \Illuminate\Http\Response
     */
    public function update(BasisUpdateRequest $request, Basis $basis)
    {
        $basis->update($request->all());

        return redirect()->route('admin.bases.index');
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
