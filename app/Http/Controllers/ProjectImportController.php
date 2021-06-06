<?php

namespace App\Http\Controllers;

use App\Jobs\ProjectImportJob;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectImportController extends Controller
{
    public function index()
    {
        abort_if(! auth()->user()->can('projects.import'), 403);

        return view('projects.import');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        // TODO: Don't forget to uncomment
//        $request->validate([
//            'id' => 'required|int|unique:projects,ipms_id',
//        ], [
//            'unique' => 'This project has already been imported before.'
//        ]);

        dispatch(new ProjectImportJob($request->id, auth()->user()));

        Alert::success('Success','Job has been sent to queues.');

        return redirect()->route('projects.import.index');
    }
}
