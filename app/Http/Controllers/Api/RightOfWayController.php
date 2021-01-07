<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RightOfWayResource;
use App\Models\Project;
use App\Models\RightOfWay;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RightOfWayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return RightOfWayResource
     */
    public function index(Project $project): RightOfWayResource
    {
        return new RightOfWayResource($project->right_of_way);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return RightOfWayResource
     */
    public function store(Request $request, Project $project): RightOfWayResource
    {
        $row = new RightOfWay;
        $row->fill($request->all());
        $project->right_of_way()->save($row);

        return new RightOfWayResource($row);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param RightOfWay $row
     * @return RightOfWayResource
     */
    public function show(Project $project, RightOfWay $row): RightOfWayResource
    {
        return new RightOfWayResource($row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param RightOfWay $row
     * @return RightOfWayResource
     */
    public function update(Request $request, Project $project, RightOfWay $row): RightOfWayResource
    {
        $row->update($request->all());

        return new RightOfWayResource($row);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param RightOfWay $row
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, RightOfWay $row)
    {
        $row->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
