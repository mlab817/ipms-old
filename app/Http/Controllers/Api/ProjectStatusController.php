<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectStatusResource;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectStatusController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProjectStatusResource::collection(ProjectStatus::all());
    }
}
