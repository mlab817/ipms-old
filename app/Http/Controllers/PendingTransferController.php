<?php

namespace App\Http\Controllers;

use App\Models\PendingTransfer;
use Illuminate\Http\Request;

class PendingTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $completed = $request->query('completed') ?? 0;

        $pendingTransfers = PendingTransfer::owned()
            ->where('completed', '=', (int) $completed)
            ->get();

        return view('pending-transfers.index', compact('pendingTransfers'))
            ->with([
                'completed' => $completed,
                'pendingCount' => PendingTransfer::owned()->where('completed', false)->count(),
                'completedCount' => PendingTransfer::owned()->where('completed', true)->count()
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
            'project_id' => 'required|exists:projects,id',
            'to' => 'required|exists:users,id',
            'remarks' => 'nullable|string|max:150',
        ]);

        $pendingTransfer = PendingTransfer::create([
            'project_id' => $request->project_id,
            'from' => auth()->id(),
            'to' => $request->to,
            'remarks' => $request->remarks,
        ]);

        // TODO: Notify user

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PendingTransfer $pendingTransfer)
    {
        $project = $pendingTransfer->project;

        if ($request->action == 'accept') {
            $pendingTransfer->completed = true;
            $pendingTransfer->save();

            $project->created_by = $pendingTransfer->to;
            $project->save();
        } else if ($request->action == 'reject') {
            $pendingTransfer->delete();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingTransfer $pendingTransfer)
    {
        $pendingTransfer->delete();

        return back();
    }
}
