<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\SpatialCoverageResource;
use App\Models\SpatialCoverage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SpatialCoverageController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return SpatialCoverageResource::collection(SpatialCoverage::all());
    }

    public function show(SpatialCoverage $spatialCoverage): ProjectCollection
    {
        $projects = $spatialCoverage->projects()->paginate();

        return new ProjectCollection($projects);
    }
}
