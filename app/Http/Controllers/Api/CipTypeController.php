<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CipTypeResource;
use App\Models\CipType;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CipTypeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CipTypeResource::collection(CipType::all());
    }
}
