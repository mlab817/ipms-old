<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LinksDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkStoreRequest;
use App\Http\Requests\LinkUpdateRequest;
use App\Models\Link;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LinksDataTable $dataTable)
    {
        return $dataTable->render('admin.links.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinkStoreRequest $request)
    {
        $link = Link::create($request->all());

        Alert::success('Success', 'Successfully added link');

        return redirect()->route('admin.links.index');
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
    public function edit(Link $link)
    {
        return view('admin.links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinkUpdateRequest $request, Link $link)
    {
        $link->update($request->all());

        Alert::success('Success', 'Successfully updated link');

        return redirect()->route('admin.links.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();

        Alert::success('Success', 'Successfully deleted link');

        return redirect()->route('admin.links.index');
    }
}
