<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewsDataTable;
use App\Events\ProjectReviewedEvent;
use App\Http\Requests\ReviewStoreRequest;
use App\Models\CipType;
use App\Models\PipTypology;
use App\Models\Project;
use App\Models\ReadinessLevel;
use App\Models\Review;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Review::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReviewsDataTable $dataTable)
    {
        return $dataTable->render('reviews.index', [
            'pageTitle' => 'Review PAPs',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project = Project::where('uuid', $request->query('project'))->firstOrFail();

        $review = new Review();

        return view('reviews.create', [
            'pageTitle' => 'Reviewing ' . $project->title,
            'review' => $review,
            'project' => $project,
            'pip_typologies' => PipTypology::all(),
            'cip_types' => CipType::all(),
            'readiness_levels' => ReadinessLevel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReviewStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewStoreRequest $request)
    {
//        dd('calling store');

        $project = Project::findOrFail($request->project_id);

        $review = $project->review()->updateOrCreate($request->validated());

        event(new ProjectReviewedEvent($review));

        Alert::success('Success', 'Review successfully saved');

        return redirect()->route('reviews.index')->with('message', 'Successfully added review');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', [
            'pageTitle'      => 'Reviewing: ' . $review->project->title,
            'review'         => $review,
            'cip_types'      => CipType::all(),
            'pip_typologies' => PipTypology::all(),
            'readiness_levels' => ReadinessLevel::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReviewStoreRequest $request
     * @param \App\Models\Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ReviewStoreRequest $request, Review $review): \Illuminate\Http\RedirectResponse
    {
        $review->update($request->all());

        return redirect()->route('reviews.index')->with('message', 'Successfully added review');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return response()->noContent();
    }
}
