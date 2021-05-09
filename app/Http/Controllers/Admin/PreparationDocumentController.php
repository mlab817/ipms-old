<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PreparationDocumentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\PreparationDocument;
use Illuminate\Http\Request;

class PreparationDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PreparationDocumentsDataTable $dataTable)
    {
        return $dataTable->render('admin.preparation_documents.index', [
            'pageTitle' => 'Preparation Documents',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.preparation_documents.create', [
            'pageTitle' => 'Preparation Documents',
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

        PreparationDocument::create($request->all());

        return redirect()->route('admin.preparation_documents.index');
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
    public function edit(PreparationDocument $preparationDocument)
    {
        return view('admin.preparation_documents.edit', [
            'pageTitle' => 'Edit Preparation Document',
            'preparation_document' => $preparationDocument,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PreparationDocument $preparationDocument)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $preparationDocument->update($request->all());

        return redirect()->route('admin.preparation_documents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PreparationDocument $preparationDocument)
    {
        $preparationDocument->delete();

        return response()->noContent();
    }
}
