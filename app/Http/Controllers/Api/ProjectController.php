<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show','search']);
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @return ProjectCollection
     */
    public function index(): ProjectCollection
    {
        return new ProjectCollection(Project::with('creator')->paginate(25));
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
     * @param Request $request
     * @param Project $project
     * @return Response
     */
    public function update(Request $request, Project $project)
    {
        //
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

    public function search(Request $request)
    {
        if ($request->search) {
            $projects = Project::search($request->search)->paginate();

            return $projects;
        }
        return 'Nothing to look for';
    }
}
