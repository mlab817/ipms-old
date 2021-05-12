<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RegionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegionStoreRequest;
use App\Http\Requests\RegionUpdateRequest;
use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RegionsDataTable $dataTable)
    {
        return $dataTable->render('admin.regions.index', [
            'pageTitle' => 'Regions'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regions.create', [
            'pageTitle' => 'Add Region',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RegionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionStoreRequest $request)
    {
        Region::create($request->all());

        return redirect()->route('admin.regions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // not in use
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Region $region
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Region $region)
    {
        return view('admin.regions.edit', [
            'pageTitle' => 'Edit Region',
            'region'    => $region,
            'method'    => 'PUT',
            'route'     => route('admin.regions.update', $region->slug),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RegionUpdateRequest $request
     * @param Region $region
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RegionUpdateRequest $request, Region $region): \Illuminate\Http\RedirectResponse
    {
        $region->update($request->all());

        return redirect()->route('admin.regions.index');
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
