<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InfrastructureSubsectorResource;
use App\Models\InfrastructureSubsector;
use Illuminate\Http\Request;

class InfrastructureSubsectorController extends Controller
{
    public function index()
    {
        $infrastructure_subsectors = InfrastructureSubsector::all();

        return InfrastructureSubsectorResource::collection($infrastructure_subsectors);
    }
}
