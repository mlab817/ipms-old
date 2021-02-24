<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApprovalLevelResource;
use App\Models\ApprovalLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ApprovalLevelController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ApprovalLevelResource::collection(ApprovalLevel::all());
    }
}
