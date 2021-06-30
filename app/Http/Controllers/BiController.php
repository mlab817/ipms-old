<?php

namespace App\Http\Controllers;

use App\Models\PapType;
use App\Models\Project;
use App\Models\SubmissionStatus;
use Illuminate\Http\Request;

class BiController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Project::query();

        if ($request->has('pap_types')) {
            $query->whereIn('pap_type_id', $request->pap_types);
        }

        $projects = $query->get();

        return view('bi', compact('projects'))
            ->with('submissionStatuses', SubmissionStatus::all())
            ->with('papTypes', PapType::all());
    }
}
