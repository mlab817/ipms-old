<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PipTypologyResource;
use App\Models\PipTypology;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PipTypologyController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PipTypologyResource::collection(PipTypology::all());
    }
}
