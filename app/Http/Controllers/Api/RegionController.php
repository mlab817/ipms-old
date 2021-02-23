<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\RegionResource;
use App\Models\Project;
use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class RegionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return RegionResource::collection(Region::all());
    }

    public function show($id): JsonResponse
    {
//        $projects = Project::whereHas('regions', function ($query) use ($id) {
//
//        })->get();
        $projects = Region::find($id)->projects()->paginate(10);

        return response()->json(new ProjectCollection($projects));
    }
}
