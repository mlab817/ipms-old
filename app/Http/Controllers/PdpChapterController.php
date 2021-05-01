<?php


namespace App\Http\Controllers;

use App\DataTables\PdpChaptersDataTable;
use App\Models\PdpChapter;
use Illuminate\Http\Request;

class PdpChapterController extends Controller
{
    public function index(PdpChaptersDataTable $dataTable)
    {
        return $dataTable->render('admin.pdp_chapters.index');
    }

    public function create()
    {
        return view('admin.pdp_chapters.create', [
            'pageTitle' => 'Add PDP Chapter',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        return redirect()->route('admin.pdp_chapters.index');
    }

    public function show(PdpChapter $pdpChapter)
    {

    }

    public function edit(Request $request, PdpChapter $pdpChapter)
    {
        return view('admin.pdp_chapters.edit', [
            'pdp_chapter' => $pdpChapter,
        ]);
    }

    public function update(Request $request, PdpChapter $pdpChapter)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $pdpChapter->update($request->all());

        return redirect()->route('admin.pdp_chapters.index');
    }

    public function destroy(Request $request, PdpChapter $pdpChapter)
    {
        $pdpChapter->delete();

        return response()->noContent();
    }
}
