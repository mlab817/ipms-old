<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BasisResource;
use App\Models\Basis;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BasisController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return BasisResource::collection(Basis::all());
    }
}
