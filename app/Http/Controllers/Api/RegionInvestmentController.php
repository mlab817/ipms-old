<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionInvestmentResource;
use App\Models\Project;
use App\Models\RegionInvestment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class RegionInvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return RegionInvestmentResource::collection($project->region_investments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return RegionInvestmentResource
     */
    public function store(Request $request, Project $project): RegionInvestmentResource
    {
        // TODO: Make sure that UUID is triggered on save
        $regionInvestment = new RegionInvestment;
        $regionInvestment->fill($request->all());
        $project->region_investments()->save($regionInvestment);

        return new RegionInvestmentResource($regionInvestment);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param RegionInvestment $regionInvestment
     * @return RegionInvestmentResource
     */
    public function show(Project $project, RegionInvestment $regionInvestment): RegionInvestmentResource
    {
        return new RegionInvestmentResource($regionInvestment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param RegionInvestment $regionInvestment
     * @return RegionInvestmentResource
     */
    public function update(Request $request, Project $project, RegionInvestment $regionInvestment): RegionInvestmentResource
    {
        $regionInvestment->update($request->all());

        return new RegionInvestmentResource($regionInvestment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param RegionInvestment $regionInvestment
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Project $project, RegionInvestment $regionInvestment): JsonResponse
    {
        $regionInvestment->delete();

        return response()->json(['message' => 'Successfully deleted resource'], 204);
    }
}
