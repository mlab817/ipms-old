<?php

namespace App\Http\Controllers;

use App\DataTables\AuditLogsDataTable;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuditLogsDataTable $dataTable)
    {
        abort_if(! auth()->user()->hasPermissionTo('audit_logs.view_index'), 403);

        return $dataTable->render('admin.audit_logs.index', [
            'pageTitle' => 'Audit Logs',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AuditLog $auditLog)
    {
        abort_if(! auth()->user()->hasPermissionTo('audit_logs.view'), 403);

        return view('admin.audit_logs.show', compact('auditLog'))
            ->with([
                'pageTitle' => 'Audit Log',
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
