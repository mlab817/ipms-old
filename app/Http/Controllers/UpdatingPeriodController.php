<?php

namespace App\Http\Controllers;

use App\Models\UpdatingPeriod;
use Illuminate\Http\Request;

class UpdatingPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updating_periods = UpdatingPeriod::all();

        return view('updating-periods.index', compact('updating_periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UpdatingPeriod  $updatingPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(UpdatingPeriod $updatingPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UpdatingPeriod  $updatingPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(UpdatingPeriod $updatingPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UpdatingPeriod  $updatingPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UpdatingPeriod $updatingPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UpdatingPeriod  $updatingPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdatingPeriod $updatingPeriod)
    {
        //
    }
}
