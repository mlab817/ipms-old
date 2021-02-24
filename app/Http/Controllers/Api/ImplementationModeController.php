<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImplementationModeResource;
use App\Models\ImplementationMode;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ImplementationModeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ImplementationModeResource::collection(ImplementationMode::all());
    }
}
