<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OperatingUnitTypeResource;
use App\Models\OperatingUnitType;
use Illuminate\Http\Request;

class OperatingUnitTypeController extends Controller
{
    public function index()
    {
        $operating_unit_types = OperatingUnitType::all();

        return OperatingUnitTypeResource::collection($operating_unit_types);
    }
}
