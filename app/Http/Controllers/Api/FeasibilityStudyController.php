<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeasibilityStudyResource;
use App\Models\FeasibilityStudy;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeasibilityStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return FeasibilityStudyResource
     */
    public function index(Project $project): FeasibilityStudyResource
    {
        return new FeasibilityStudyResource($project->feasibility_study);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return FeasibilityStudyResource
     */
    public function store(Request $request, Project $project): FeasibilityStudyResource
    {
        $fs = new FeasibilityStudy;
        $fs->fill($request->all());
        $project->feasibility_study()->save($fs);

        return new FeasibilityStudyResource($fs);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param FeasibilityStudy $fs
     * @return FeasibilityStudyResource
     */
    public function show(Project $project, FeasibilityStudy $fs): FeasibilityStudyResource
    {
        return new FeasibilityStudyResource($fs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param FeasibilityStudy $fs
     * @return FeasibilityStudyResource
     */
    public function update(Request $request, Project $project, FeasibilityStudy $fs): FeasibilityStudyResource
    {
        $fs->update($request->all());

        return new FeasibilityStudyResource($fs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param FeasibilityStudy $fs
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, FeasibilityStudy $fs): JsonResponse
    {
        $fs->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
