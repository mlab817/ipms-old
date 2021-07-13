<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectReviewStoreRequest;
use App\Models\CipType;
use App\Models\PipTypology;
use App\Models\Project;
use App\Models\ReadinessLevel;
use App\Models\Review;
use Illuminate\Http\Request;

class ProjectReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('projects.reviews.index', [
            'project'   => $project,
            'review'    => $project->review,
            'pip_typologies' => PipTypology::all(),
            'cip_types' => CipType::all(),
            'readiness_levels' => ReadinessLevel::all(),
            'yesNo' => [
                0 => 'No',
                1 => 'Yes',
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('projects.reviews.create', [
            'project'   => $project,
            'review'    => new Review,
            'pip_typologies' => PipTypology::all(),
            'cip_types' => CipType::all(),
            'readiness_levels' => ReadinessLevel::all(),
            'yesNo' => [
                0 => 'No',
                1 => 'Yes',
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectReviewStoreRequest $request
     * @param Project $project
     * @return void
     */
    public function store(ProjectReviewStoreRequest $request, Project $project)
    {
        $project->review()->updateOrCreate([
            'project_id' => $project->id
        ], $request->validated());

        return redirect()->route('projects.reviews.index', $project)
            ->with('success','Successfully saved review.');
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
    public function edit(Review $review)
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
    public function update(ProjectReviewStoreRequest $request, Project $project, Review $review)
    {
        $project->review()->updateOrCreate([
            'project_id' => $project->id
        ], $request->validated());

        return redirect()->route('projects.reviews.index', $project)
            ->with('success','Successfully updated review.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Review $review)
    {
        $review->delete();

        return redirect()->route('projects.reviews.index', $project)
            ->with('success','Successfully saved review.');
    }
}
