<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FsStatusResource;
use App\Models\FsStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FsStatusController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return FsStatusResource::collection(FsStatus::all());
    }
}
