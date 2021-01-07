<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NepResource;
use App\Models\Nep;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return NepResource|null
     */
    public function index(Project $project): ?NepResource
    {
        if (! $project->nep) {
            abort(404);
        }

        return new NepResource($project->nep);
    }

    public function show(Project $project, Nep $nep): NepResource
    {
        return new NepResource($nep);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return NepResource
     */
    public function store(Request $request, Project $project): NepResource
    {
        $nep = new Nep;
        $nep = $nep->fill($request->all());
        $project->nep()->save($nep);

        return new NepResource($nep);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return NepResource
     */
    public function update(Request $request, Project $project): NepResource
    {
        $project->nep->update($request->all());

        return new NepResource($project->nep);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param Nep $nep
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, Nep $nep): JsonResponse
    {
        $nep->delete();

        return response()->json([
            'message'   => 'Success'
        ], 200);
    }
}
