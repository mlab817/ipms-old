<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrerequisiteResource;
use App\Models\Prerequisite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PrerequisiteController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PrerequisiteResource::collection(Prerequisite::all());
    }
}
