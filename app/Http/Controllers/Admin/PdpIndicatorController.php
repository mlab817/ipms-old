<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PdpIndicatorsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PdpIndicatorStoreRequest;
use App\Http\Requests\PdpIndicatorUpdateRequest;
use App\Models\PdpIndicator;
use Illuminate\Http\Request;


class PdpIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PdpIndicatorsDataTable $dataTable)
    {
        return $dataTable->render('admin.pdp_indicators.index', [
            'pageTitle' => 'PDP-RM Indicators',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pdp_indicators.create', [
            'pageTitle' => 'Add PDP RM Indicator',
            'levels'    => [
                1 => 'Chapter',
                2 => 'Outcome',
                3 => 'Suboutcome',
                4 => 'Output',
            ],
            'pdp_indicators'    => PdpIndicator::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PdpIndicatorStoreRequest $request)
    {
        $pdpIndicator = PdpIndicator::create($request->all());

        Alert::success('Success','Successfully saved item');

        return redirect()->route('admin.pdp_indicators.index');
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
    public function edit(PdpIndicator $pdpIndicator)
    {
        return view('admin.pdp_indicators.edit', compact('pdpIndicator'))->with([
            'pageTitle' => 'Edit PDP RM Indicator',
            'levels'    => [
                1 => 'Chapter',
                2 => 'Outcome',
                3 => 'Suboutcome',
                4 => 'Output',
            ],
            'pdp_indicators'    => PdpIndicator::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PdpIndicatorUpdateRequest $request, PdpIndicator $pdpIndicator)
    {
        $pdpIndicator->update($request->all());

        Alert::success('Success','Successfully update item');

        return redirect()->route('admin.pdp_indicators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PdpIndicator $pdpIndicator)
    {
        $pdpIndicator->delete();

        Alert::success('Success','Successfully deleted item');

        return redirect()->route('admin.pdp_indicators.index');
    }
}
