<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->middleware('auth:api')->except(['index','show']);
//        $this->authorizeResource(Project::class);
        $this->projectService = $projectService;
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
     * @param CreateProjectRequest $request
     * @return ProjectResource
     */
    public function store(CreateProjectRequest $request): ProjectResource
    {
        $project = $this->projectService->create($request);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return ProjectResource
     */
    public function show(string $slug): ProjectResource
    {
        $project = $this->projectService->findBySlug($slug);

        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($slug): JsonResponse
    {
        $project = $this->projectService->findBySlug($slug);
        $this->authorize('delete', $project);
        $project->delete();

        return response()->json(null, 204);
    }
}
