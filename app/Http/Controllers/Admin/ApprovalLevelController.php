<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ApprovalLevelsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApprovalLevelRequest;
use App\Models\ApprovalLevel;
use Illuminate\Http\Request;


class ApprovalLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApprovalLevelsDataTable $dataTable)
    {
        return $dataTable->render('admin.approval_levels.index', [
                'pageTitle' => 'Approval Levels'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.approval_levels.create')
            ->with('pageTitle', 'Add Approval Level');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApprovalLevelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'name'  => 'required|string|unique:approval_levels',
        ]);

        ApprovalLevel::create($validatedData);

        if ($request->ajax()) {
            return response()->json(['message' => 'Successfully added item'], 200);
        }

        Alert::success('Success', 'Successfully saved item.');

        return redirect()->route('admin.approval_levels.index');
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
    public function edit(ApprovalLevel $approvalLevel)
    {
      return view('admin.approval_levels.edit')
        ->with('pageTitle', 'Edit Approval Level')
        ->with('approval_level', $approvalLevel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApprovalLevel $approvalLevel)
    {
        $validatedData = $request->validate([
          'name'  => 'required|string',
        ]);

        $approvalLevel->update($validatedData);

        if ($request->ajax()) {
            return response()->json(['message' => 'Successfully updated item'], 200);
        }

        Alert::success('Success', 'Successfully updated item.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ApprovalLevel $approvalLevel)
    {
        $approvalLevel->delete();

        Alert::success('Success', 'Successfully deleted item.');

        return redirect()->route('admin.approval_levels.index');
    }
}
