<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\InfrastructureSectorsDataTable;
use App\Http\Controllers\Controller;
use App\Models\InfrastructureSector;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InfrastructureSectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(InfrastructureSectorsDataTable $dataTable)
    {
        return $dataTable->render('admin.infrastructure_sectors.index', [
            'pageTitle' => 'Infrastructure Sector',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.infrastructure_sectors.create', [
           'pageTitle' => 'Add Infrastructure Sector'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        InfrastructureSector::create($request->all());

        Alert::success('Success', 'Successfully saved item');

        return redirect()->route('admin.infrastructure_sectors.index');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(InfrastructureSector $infrastructureSector)
    {
        return view('admin.infrastructure_sectors.edit', compact('infrastructureSector'))->with([
            'pageTitle' => 'Edit Infrastructure Sector',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, InfrastructureSector $infrastructureSector)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $infrastructureSector->update($request->all());

        Alert::success('Success', 'Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(InfrastructureSector $infrastructureSector)
    {
        $infrastructureSector->delete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.infrastructure_sectors.index');
    }
}
