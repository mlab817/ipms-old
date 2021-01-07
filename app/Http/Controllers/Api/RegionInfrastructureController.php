<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionInfrastructureResource;
use App\Models\Project;
use App\Models\RegionInfrastructure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class RegionInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return RegionInfrastructureResource::collection($project->region_infrastructures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return RegionInfrastructureResource
     */
    public function store(Request $request, Project $project): RegionInfrastructureResource
    {
        $regionInfrastructure = new RegionInfrastructure;
        $regionInfrastructure->fill($request->all());
        $project->region_infrastructures()->save($regionInfrastructure);

        return new RegionInfrastructureResource($regionInfrastructure);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param RegionInfrastructure $regionInfrastructure
     * @return RegionInfrastructureResource
     */
    public function show(Project $project, RegionInfrastructure $regionInfrastructure): RegionInfrastructureResource
    {
        return new RegionInfrastructureResource($regionInfrastructure);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param RegionInfrastructure $regionInfrastructure
     * @return RegionInfrastructureResource
     */
    public function update(Request $request, Project $project, RegionInfrastructure $regionInfrastructure): RegionInfrastructureResource
    {
        $regionInfrastructure->update($request->all());

        return new RegionInfrastructureResource($regionInfrastructure);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param RegionInfrastructure $regionInfrastructure
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, RegionInfrastructure $regionInfrastructure): JsonResponse
    {
        $regionInfrastructure->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
