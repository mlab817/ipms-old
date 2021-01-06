<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RegionInvestmentResource;
use App\Models\Project;
use App\Models\RegionInvestment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class RegionInvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return AnonymousResourceCollection
     */
    public function index(Project $project): AnonymousResourceCollection
    {
        return RegionInvestmentResource::collection($project->region_investments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param RegionInvestment $regionInvestment
     * @return RegionInvestmentResource
     */
    public function show(Project $project, RegionInvestment $regionInvestment): RegionInvestmentResource
    {
        return new RegionInvestmentResource($regionInvestment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Project $project
     * @param RegionInvestment $regionInvestment
     * @return RegionInvestmentResource
     */
    public function update(Request $request, Project $project, RegionInvestment $regionInvestment): RegionInvestmentResource
    {
        $regionInvestment->update($request->all());

        return new RegionInvestmentResource($regionInvestment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
