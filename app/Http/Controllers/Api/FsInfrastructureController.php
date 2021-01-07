<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FsInfrastructureResource;
use App\Models\FsInfrastructure;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class FsInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return FsInfrastructureResource::collection($project->fs_infrastructures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return FsInfrastructureResource
     */
    public function store(Request $request, Project $project): FsInfrastructureResource
    {
        $fsInfrastructure = new FsInfrastructure;
        $fsInfrastructure->fill($request->all());
        $project->fs_infrastructures()->save($fsInfrastructure);

        return new FsInfrastructureResource($fsInfrastructure);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param FsInfrastructure $fsInfrastructure
     * @return FsInfrastructureResource
     */
    public function show(Project $project, FsInfrastructure $fsInfrastructure): FsInfrastructureResource
    {
        return new FsInfrastructureResource($fsInfrastructure);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param FsInfrastructure $fsInfrastructure
     * @return FsInfrastructureResource
     */
    public function update(Request $request, Project $project, FsInfrastructure $fsInfrastructure): FsInfrastructureResource
    {
        $fsInfrastructure->update($request->all());

        return new FsInfrastructureResource($fsInfrastructure);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param FsInfrastructure $fsInfrastructure
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Project $project, FsInfrastructure $fsInfrastructure): JsonResponse
    {
        $fsInfrastructure->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
