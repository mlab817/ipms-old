<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FundingSourceResource;
use App\Models\FundingSource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FundingSourceController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return FundingSourceResource::collection(FundingSource::all());
    }
}
