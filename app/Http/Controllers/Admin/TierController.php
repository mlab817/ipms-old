<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TiersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tier;
use Illuminate\Http\Request;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TiersDataTable $dataTable)
    {
        return $dataTable->render('admin.tiers.index', [
            'pageTitle' => 'Budget Tiers'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiers.create', [
            'pageTitle' => 'Add Budget Tier'
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
            'name' => 'required'
        ]);

        Tier::create($request->all());

        return redirect()->route('admin.tiers.index');
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
    public function edit(Tier $tier)
    {
        return view('admin.tiers.edit', [
            'pageTitle' => 'Edit Budget Tier',
            'tier' => $tier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tier $tier)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $tier->update($request->all());

        return redirect()->route('admin.tiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tier $tier)
    {
        $tier->delete();

        return response()->noContent();
    }
}
