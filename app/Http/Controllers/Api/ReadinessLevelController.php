<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReadinessLevelResource;
use App\Models\ReadinessLevel;

class ReadinessLevelController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $readiness_levels = ReadinessLevel::all();

        return ReadinessLevelResource::collection($readiness_levels);
    }
}
