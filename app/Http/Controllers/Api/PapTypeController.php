<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PapTypeResource;
use App\Http\Resources\ProjectCollection;
use App\Models\PapType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PapTypeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PapTypeResource::collection(PapType::all());
    }

    public function show(PapType $papType): ProjectCollection
    {
        $projects = $papType->projects()->paginate();

        return new ProjectCollection($projects);
    }
}
