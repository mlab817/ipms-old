<?php

namespace App\Http\Controllers;

use App\Jobs\ProjectImportJob;
use App\Models\FundingInstitution;
use App\Models\FundingSource;
use App\Models\Gad;
use App\Models\ImplementationMode;
use App\Models\Office;
use App\Models\PapType;
use App\Models\PdpChapter;
use App\Models\PreparationDocument;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\SpatialCoverage;
use App\Models\Tier;
use App\Services\ProjectCreateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
    public function import(Request $request, ProjectCreateService $createService)
    {
        $request->validate([
            'id' => 'required|int|unique:projects,ipms_id',
        ], [
            'unique' => 'This project has already been imported before.'
        ]);

        dispatch(new ProjectImportJob($request->id, auth()->user()));

        Alert::success('Success','Job has been sent to queues.');

        return redirect()->route('projects.import.index');
    }
}
