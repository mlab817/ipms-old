<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OuInvestmentResource;
use App\Models\OuInvestment;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class OuInvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return OuInvestmentResource::collection($project->ou_investments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return OuInvestmentResource
     */
    public function store(Request $request, Project $project): OuInvestmentResource
    {
        $ouInvestment = new OuInvestment;
        $ouInvestment->fill($request->all());
        $project->ou_investments()->save($ouInvestment);

        return new OuInvestmentResource($ouInvestment);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param OuInvestment $ouInvestment
     * @return OuInvestmentResource
     */
    public function show(Project $project, OuInvestment $ouInvestment): OuInvestmentResource
    {
        return new OuInvestmentResource($ouInvestment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param OuInvestment $ouInvestment
     * @return OuInvestmentResource
     */
    public function update(Request $request, Project $project, OuInvestment $ouInvestment): OuInvestmentResource
    {
        $ouInvestment->update($request->all());

        return new OuInvestmentResource($ouInvestment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param OuInvestment $ouInvestment
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, OuInvestment $ouInvestment): JsonResponse
    {
        $ouInvestment->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
