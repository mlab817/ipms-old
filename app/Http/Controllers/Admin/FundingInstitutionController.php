<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FundingInstitutionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\FundingInstitution;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FundingInstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FundingInstitutionsDataTable $dataTable)
    {
        return $dataTable->render('admin.funding_institutions.index', [
            'pageTitle' => 'Funding Institutions',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.funding_institutions.create', [
            'pageTitle' => 'Add Funding Institution',
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
            'name' => 'required|unique:funding_institutions,name',
        ]);

        FundingInstitution::create($request->all());

        Alert::success('Success', 'Successfully saved item');

        return redirect()->route('admin.funding_institutions.index');
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
    public function edit(FundingInstitution $fundingInstitution)
    {
        return view('admin.funding_institutions.edit', compact('fundingInstitution'))->with([
            'pageTitle' => 'Edit Funding Institution',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundingInstitution $fundingInstitution)
    {
        $request->validate([
            'name' => 'required|unique:funding_institutions,name,' . $request->id,
        ]);

        $fundingInstitution->update($request->all());

        Alert::success('Success', 'Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundingInstitution $fundingInstitution)
    {
        $fundingInstitution->delete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('admin.funding_institutions.index');
    }
}
