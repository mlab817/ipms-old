<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OperatingUnitResource;
use App\Models\OperatingUnit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OperatingUnitController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return OperatingUnitResource::collection(OperatingUnit::all());
    }
}
