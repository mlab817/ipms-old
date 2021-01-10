<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getInvestmentByFundingSource(): JsonResponse
    {
        $data = $this->projectService->getInvestmentByFundingSource();

        return response()->json($data, 200);
    }

    public function getInfrastructureByFundingSource(): JsonResponse
    {
        $data = $this->projectService->getInfrastructureByFundingSource();

        return response()->json($data, 200);
    }

    public function getInvestmentByRegion(): JsonResponse
    {
        $data = $this->projectService->getInvestmentByRegion();

        return response()->json($data, 200);
    }

    public function getInfrastructureByRegion(): JsonResponse
    {
        $data = $this->projectService->getInfrastructureByRegion();

        return response()->json($data, 200);
    }
}
