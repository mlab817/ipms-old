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
    public function index(Request $request)
    {
        $query = Project::query()->with(['creator.office','office','review.user.office']);

        if ($request->query('search')) {
            $query->where('title', 'like', '%' . $request->query('search') . '%');
        }

        if ($request->has('no_review')) {
            if (! $request->query('no_review')) {
                $query->whereHas('review');
            } else {
                $query->whereDoesntHave('review');
            }
        }

        return view('reviews.index')->with([
            'pipCount' => Review::where('pip', true)->count(),
            'tripCount'=> Review::where('trip', true)->count(),
            'reviewedCount' => Project::whereHas('review')->count(),
            'projectCount'  => Project::count(),
            'projects'      => $query->paginate(),
        ]);
    }

    public function show(Review $review)
    {
        // can pass project and review
        return view('reviews.show')
            ->with([
                'review' => $review,
                'project'=> $review->project,
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
            'pageTitle'         => 'Reviewing: ' . $review->project->title,
            'review'            => $review,
            'cip_types'         => CipType::all(),
            'pip_typologies'    => PipTypology::all(),
            'readiness_levels'  => ReadinessLevel::all(),
            'project'           => $review->project,
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
        $review->forceDelete();

        Alert::success('Success', 'Successfully deleted item');

        return redirect()->route('reviews.index');
    }
}
