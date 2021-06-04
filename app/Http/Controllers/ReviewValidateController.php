<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewValidateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Review $review)
    {
        $review->validate();

        Alert::success('Success', 'Successfully validated project');

        return back();
    }
}
