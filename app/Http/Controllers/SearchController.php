<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchResults = [];

        if ($searchTerm = $request->search) {
            $searchResults = (new Search())
                ->registerModel(Project::class,'title')
                ->limitAspectResults(10)
                ->search($searchTerm);
        }

        if ($request->ajax()) {
            return response()->json($searchResults);
        }

        return view('search-results', compact('searchResults'));
    }
}
