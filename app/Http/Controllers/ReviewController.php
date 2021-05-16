<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewsDataTable;
use App\Events\ProjectReviewedEvent;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Requests\ReviewUpdateRequest;
use App\Models\CipType;
use App\Models\PipTypology;
use App\Models\Project;
use App\Models\ReadinessLevel;
use App\Models\Review;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function __construct(Request $request)
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
            'pipCount' => Review::where('pip', true)->count(),
            'tripCount'=> Review::where('trip', true)->count(),
            'reviewedCount' => Project::whereHas('review')->count(),
            'projectCount'  => Project::count(),
        ]);
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
    public function update(ReviewUpdateRequest $request, Review $review): \Illuminate\Http\RedirectResponse
    {
        $review->update($request->all());

        Alert::success('Success', 'Successfully updated item.');

        return back();
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

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('reviews.index');
    }
}
