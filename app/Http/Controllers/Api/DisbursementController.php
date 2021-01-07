<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DisbursementResource;
use App\Models\Disbursement;
use App\Models\Project;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return DisbursementResource
     */
    public function index(Project $project): DisbursementResource
    {
        return new DisbursementResource($project->disbursement);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @return DisbursementResource
     */
    public function store(Request $request, Project $project): DisbursementResource
    {
        $disbursement = new Disbursement;
        $disbursement->fill($request->all());
        $project->disbursement()->save($disbursement);

        return new DisbursementResource($disbursement);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Disbursement $disbursement
     * @return DisbursementResource
     */
    public function show(Project $project, Disbursement $disbursement): DisbursementResource
    {
        return new DisbursementResource($disbursement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param Disbursement $disbursement
     * @return DisbursementResource
     */
    public function update(Request $request, Project $project, Disbursement $disbursement): DisbursementResource
    {
        $disbursement->update($request->all());

        return new DisbursementResource($disbursement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param Disbursement $disbursement
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Project $project, Disbursement $disbursement): JsonResponse
    {
        $disbursement->delete();

        return response()->json([
            'message' => 'Success'
        ], 200);
    }
}
