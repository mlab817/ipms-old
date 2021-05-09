<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BasesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BasisStoreRequest;
use App\Http\Requests\BasisUpdateRequest;
use App\Models\Basis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('admin.bases.create', [
            'pageTitle' => 'Create Implementation Basis',
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

        Alert::success('Success', 'Successfully saved item.');

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
        return view('admin.bases.edit', [
            'pageTitle' => 'Edit Implementation Basis',
            'basis'     => $basis,
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

        Alert::success('Success', 'Successfully updated item.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basis $basis)
    {
        $basis->delete();

        Alert::success('Success', 'Successfully deleted item.');

        return redirect()->route('admin.bases.index');
    }
}
