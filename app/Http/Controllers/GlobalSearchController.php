<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class GlobalSearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $searchTerm = $request->search;

        if ($searchTerm) {
            $searchResults = (new Search())
                ->registerModel(Project::class,'title')
                ->search($searchTerm);

            if (count($searchResults) > 0) {
                return response()->json([
                    'data' => $searchResults
                ], 200);
            }

            return response()->json('Nothing found', 404);
        }
    }
}
