<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TierResource;
use App\Models\Tier;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TierController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TierResource::collection(Tier::all());
    }
}
