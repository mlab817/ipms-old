<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CovidInterventionsDataTable;
use App\Http\Controllers\Controller;
use App\Models\CovidIntervention;
use Illuminate\Http\Request;


class CovidInterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CovidInterventionsDataTable $dataTable)
    {
        return $dataTable->render('admin.covid_interventions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.covid_interventions.create');
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

        $covidIntervention = CovidIntervention::create($request->all());

        Alert::success('Success','Successfully saved item');

        return redirect()->route('admin.covid_interventions.index');
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
    public function edit(CovidIntervention $covidIntervention)
    {
        return view('admin.covid_interventions.edit', compact('covidIntervention'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CovidIntervention $covidIntervention)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $covidIntervention->update($request->all());

        Alert::success('Success','Successfully updated item');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CovidIntervention $covidIntervention)
    {
        $covidIntervention->delete();

        Alert::success('Success','Successfully deleted item');

        return redirect()->route('admin.covid_interventions.index');
    }
}
