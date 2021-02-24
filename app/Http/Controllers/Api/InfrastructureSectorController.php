<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InfrastructureSectorResource;
use App\Models\InfrastructureSector;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class InfrastructureSectorController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return InfrastructureSectorResource::collection(InfrastructureSector::with('children')->get());
    }
}
