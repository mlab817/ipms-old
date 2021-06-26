<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SdgsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SdgStoreRequest;
use App\Http\Requests\SdgUpdateRequest;
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
    public function store(SdgStoreRequest $request)
    {
        Sdg::create($request->all());

        Alert::success('Success', 'Successfully saved item');

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
    public function update(SdgUpdateRequest $request, Sdg $sdg)
    {
        $sdg->update($request->all());

        Alert::success('Success', 'Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sdg $sdg)
    {
        $sdg->delete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.sdgs.index');
    }
}
