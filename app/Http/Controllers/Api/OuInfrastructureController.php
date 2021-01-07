<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OuInfrastructureResource;
use App\Models\OuInfrastructure;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OuInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return OuInfrastructureResource::collection($project->ou_infrastructures);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return OuInfrastructureResource
     */
    public function store(Request $request, Project $project): OuInfrastructureResource
    {
        $ouInfrastructure = new OuInfrastructure;
        $ouInfrastructure->fill($request->all());
        $project->ou_infrastructures()->save($ouInfrastructure);

        return new OuInfrastructureResource($ouInfrastructure);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param OuInfrastructure $ouInfrastructure
     * @return OuInfrastructureResource
     */
    public function show(Project $project, OuInfrastructure $ouInfrastructure): OuInfrastructureResource
    {
        return new OuInfrastructureResource($ouInfrastructure);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param OuInfrastructure $ouInfrastructure
     * @return OuInfrastructureResource
     */
    public function update(Request $request, Project $project, OuInfrastructure $ouInfrastructure): OuInfrastructureResource
    {
        $ouInfrastructure->update($request->all());

        return new OuInfrastructureResource($ouInfrastructure);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param OuInfrastructure $ouInfrastructure
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, OuInfrastructure $ouInfrastructure): JsonResponse
    {
        $ouInfrastructure->delete();

        return response()->json([
            'message'   => 'Success'
        ], 200);
    }
}
