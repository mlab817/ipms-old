<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FsInfrastructureResource;
use App\Http\Resources\FsInvestmentResource;
use App\Models\FsInvestment;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class FsInvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return FsInfrastructureResource::collection($project->fs_investments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return FsInvestmentResource
     */
    public function store(Request $request, Project $project): FsInvestmentResource
    {
        $fsInvestment = new FsInvestment;
        $fsInvestment->fill($request->all());
        $project->fs_investments()->save($fsInvestment);

        return new FsInvestmentResource($fsInvestment);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param FsInvestment $fsInvestment
     * @return FsInvestmentResource
     */
    public function show(Project $project, FsInvestment $fsInvestment): FsInvestmentResource
    {
        return new FsInvestmentResource($fsInvestment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param FsInvestment $fsInvestment
     * @return FsInvestmentResource
     */
    public function update(Request $request, Project $project, FsInvestment $fsInvestment): FsInvestmentResource
    {
        $fsInvestment->update($request->all());

        return new FsInvestmentResource($fsInvestment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param FsInvestment $fsInvestment
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, FsInvestment $fsInvestment): JsonResponse
    {
        $fsInvestment->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
