<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SdgResource;
use App\Models\Sdg;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SdgController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return SdgResource::collection(Sdg::all());
    }
}
