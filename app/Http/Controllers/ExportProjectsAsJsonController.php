<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Jobs\ExportProjectsAsJsonJob;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class ExportProjectsAsJsonController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke(Request $request)
    {
        dispatch(new ExportProjectsAsJsonJob(auth()->id()));

        Alert::success('Success', 'The export job has been queued. You will be notified once it is ready');

        return back();
    }
}
