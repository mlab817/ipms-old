<?php

namespace App\Http\Controllers;

use App\Http\Requests\PipolStoreRequest;
use App\Http\Requests\PipolUpdateRequest;
use App\Models\Pipol;
use App\Models\Project;
use App\Models\Reason;
use App\Models\SubmissionStatus;
use Illuminate\Http\Request;

class ProjectPipolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $project->load('pipol');

        $pipol = $project->pipol ? $project->pipol : new Pipol();

        return view('projects.pipols.index', compact('pipol'))
            ->with('project', $project)
            ->with('submissionStatus', Pipol::SUBMISSION_STATUS)
            ->with('reasons', Reason::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function store(PipolStoreRequest $request, Project $project)
    {
        // if project already has a pipol entry, return error
        if ($project->pipol) {
            session()->flash('error','Project already has a PIPOL entry');

            return back();
        }

        $project->pipol()->create(array_merge($request->validated(),[
                'user_id' => auth()->id(),
            ]));

        return redirect()->route('projects.pipols.index', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Pipol $pipol)
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
    public function update(PipolUpdateRequest $request, Project $project, Pipol $pipol)
    {
        $pipol->update($request->all());

        session()->flash('success', 'Updated successfully');

        return back();
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
