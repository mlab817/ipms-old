<?php

namespace App\Http\Controllers;

use App\DataTables\FundingSourcesDataTable;
use App\Models\FundingSource;
use Illuminate\Http\Request;

class FundingSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FundingSourcesDataTable $dataTable)
    {
        return $dataTable->render('admin.funding_sources.index', [
            'pageTitle' => 'Funding Sources'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.funding_sources.create', [
            'pageTitle' => 'Add Funding Source',
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

        FundingSource::create($request->all());

        return redirect()->route('admin.funding_sources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FundingSource $fundingSource)
    {
        return view('admin.funding_sources.edit', [
            'pageTitle' => 'Edit Funding Source',
            'funding_source' => $fundingSource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundingSource $fundingSource)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $fundingSource->update($request->all());

        return redirect()->route('admin.funding_sources.index');
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
