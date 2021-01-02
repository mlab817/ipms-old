<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return ProjectCollection
     */
    public function index(Request $request): ProjectCollection
    {
        if ($request->search) {
            return new ProjectCollection(Project::search($request->search)->paginate(10));
        }

        return new ProjectCollection(Project::with('creator')->paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @return ProjectResource
     */
    public function store(CreateProjectRequest $request): ProjectResource
    {
        $project = Project::create($request->validated());

        $project->regions()->sync($request->regions);
        $project->bases()->sync($request->bases);
        $project->funding_sources()->sync($request->funding_sources);
        $project->funding_institutions()->sync($request->funding_institutions);
        $project->implementing_agencies()->sync($request->implementing_agencies);
        $project->pdp_chapters()->sync($request->pdp_chapters);
        $project->prerequisites()->sync($request->prerequisites);
        $project->sdgs()->sync($request->sdgs);
        $project->ten_point_agendas()->sync($request->ten_point_agendas);

        if ($request->allocation) {
            $project->allocation()->create($request->allocation);
        }

        if ($request->disbursement) {
            $project->disbursement()->create($request->disbursement);
        }

        if ($request->feasibility_study) {
            $project->feasibility_study()->create($request->feasibility_study);
        }

        if ($request->nep) {
            $project->nep()->create($request->nep);
        }

        if ($request->resettlement_action_plan) {
            $project->resettlement_action_plan()->create($request->resettlement_action_plan);
        }

        if ($request->right_of_way) {
            $project->right_of_way()->create($request->right_of_way);
        }

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return ProjectResource
     */
    public function show(Project $project): ProjectResource
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return ProjectResource
     */
    public function update(UpdateProjectRequest $request, Project $project): ProjectResource
    {
        $project->update($request->all());

        $project->regions()->sync($request->regions);
        $project->bases()->sync($request->bases);
        $project->funding_sources()->sync($request->funding_sources);
        $project->funding_institutions()->sync($request->funding_institutions);
        $project->implementing_agencies()->sync($request->implementing_agencies);
        $project->pdp_chapters()->sync($request->pdp_chapters);
        $project->prerequisites()->sync($request->prerequisites);
        $project->sdgs()->sync($request->sdgs);
        $project->ten_point_agendas()->sync($request->ten_point_agendas);

        if ($request->allocation) {
            $project->allocation()->updateOrCreate($request->allocation);
        } else {
            $project->allocation->delete();
        }

        if ($request->disbursement) {
            $project->disbursement()->updateOrCreate($request->disbursement);
        } else {
            $project->allocation->delete();
        }

        if ($request->feasibility_study) {
            $project->feasibility_study()->updateOrCreate($request->feasibility_study);
        } else {
            $project->allocation->delete();
        }

        if ($request->nep) {
            $project->nep()->updateOrCreate($request->nep);
        } else {
            $project->allocation->delete();
        }

        if ($request->resettlement_action_plan) {
            $project->resettlement_action_plan()->updateOrCreate($request->resettlement_action_plan);
        } else {
            $project->allocation->delete();
        }

        if ($request->right_of_way) {
            $project->right_of_way()->updateOrCreate($request->right_of_way);
        } else {
            $project->allocation->delete();
        }

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Project $project): JsonResponse
    {
        $project->delete();

        return response()->json(null, 204);
    }
}
