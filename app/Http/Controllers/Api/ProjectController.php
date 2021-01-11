<?php

namespace App\Http\Controllers\Api;

use App\Events\CreateProjectEvent;
use App\Events\DeleteProjectEvent;
use App\Events\UpdateProjectEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Set default count for pagination
     *
     * @var int
     */
    public $defaultCount = 10;

    /**
     * Set maximum count for pagination
     *
     * @var int
     */
    public $maxCount = 50;

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index','show']);
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return ProjectCollection
     */
    public function index(Request $request): ProjectCollection
    {
        $queryString = trim($request->query('q'));

        // if first is defined and it does not exceed the maxCount allowed,
        // set perPage to first; otherwise, set it to maxCount;
        // if first is not defined, just set it to default count
        $perPage = $request->query('first')
            ? ($request->query('first') <= $this->maxCount ? $request->query('first') : $this->maxCount)
            : $this->defaultCount;

        if ($queryString) {
            return new ProjectCollection(Project::search($queryString)->paginate($perPage));
        }

        // if there is no search query, return projects sorted by updated_at from the latest updated
        return new ProjectCollection(Project::with('creator')->orderBy('updated_at','DESC')->paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProjectRequest $request
     * @return ProjectResource
     */
    public function store(StoreProjectRequest $request): ProjectResource
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

        event(new CreateProjectEvent($project));

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
     * @param StoreProjectRequest $request
     * @param Project $project
     * @return ProjectResource
     */
    public function update(StoreProjectRequest $request, Project $project): ProjectResource
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
        }

        if ($request->disbursement) {
            $project->disbursement()->updateOrCreate($request->disbursement);
        }

        if ($request->feasibility_study) {
            $project->feasibility_study()->updateOrCreate($request->feasibility_study);
        }

        if ($request->nep) {
            $project->nep()->updateOrCreate($request->nep);
        }

        if ($request->resettlement_action_plan) {
            $project->resettlement_action_plan()->updateOrCreate($request->resettlement_action_plan);
        }

        if ($request->right_of_way) {
            $project->right_of_way()->updateOrCreate($request->right_of_way);
        }

        event(new UpdateProjectEvent($project));

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project): JsonResponse
    {
        event(new DeleteProjectEvent($project));

        $project->delete();

        return response()->json(null, 204);
    }
}
