<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GadResource;
use App\Models\Gad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GadController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return GadResource::collection(Gad::all());
    }
}
