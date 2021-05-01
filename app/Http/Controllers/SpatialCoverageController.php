<?php

namespace App\Http\Controllers;

use App\DataTables\SpatialCoveragesDataTable;
use App\Models\SpatialCoverage;
use Illuminate\Http\Request;

class SpatialCoverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SpatialCoveragesDataTable $dataTable)
    {
        return $dataTable->render('admin.spatial_coverages.index', [
            'pageTitle' => 'Spatial Coverages',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spatial_coverages.create', [
            'pageTitle' => 'Add Spatial Coverage',
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

        SpatialCoverage::create($request->all());

        return redirect()->route('admin.spatial_coverages.index');
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
    public function edit(SpatialCoverage $spatialCoverage)
    {
        return view('admin.spatial_coverages.edit', [
            'pageTitle' => 'Edit Spatial Coverage',
            'spatial_coverage' => $spatialCoverage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpatialCoverage $spatialCoverage)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $spatialCoverage->update($request->all());

        return redirect()->route('admin.spatial_coverages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpatialCoverage $spatialCoverage)
    {
        $spatialCoverage->delete();

        return response()->noContent();
    }
}
