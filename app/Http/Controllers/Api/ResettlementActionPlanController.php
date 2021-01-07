<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResettlementActionPlanResource;
use App\Models\Project;
use App\Models\ResettlementActionPlan;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResettlementActionPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return ResettlementActionPlanResource
     */
    public function index(Project $project): ResettlementActionPlanResource
    {
        return new ResettlementActionPlanResource($project->resettlement_action_plan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return ResettlementActionPlanResource
     */
    public function store(Request $request, Project $project): ResettlementActionPlanResource
    {
        $rap = new ResettlementActionPlan;
        $rap->fill($request->all());
        $project->resettlement_action_plan()->save($rap);

        return new ResettlementActionPlanResource($rap);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param ResettlementActionPlan $rap
     * @return ResettlementActionPlanResource
     */
    public function show(Project $project, ResettlementActionPlan $rap): ResettlementActionPlanResource
    {
        return new ResettlementActionPlanResource($rap);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param ResettlementActionPlan $rap
     * @return ResettlementActionPlanResource
     */
    public function update(Request $request, Project $project, ResettlementActionPlan $rap): ResettlementActionPlanResource
    {
        $rap->update($request->all());

        return new ResettlementActionPlanResource($rap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param ResettlementActionPlan $rap
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, ResettlementActionPlan $rap): JsonResponse
    {
        $rap->delete();

        return response()->json([
            'data' => 'Success'
        ], 200);
    }
}
