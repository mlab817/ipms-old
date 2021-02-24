<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FundingInstitutionResource;
use App\Models\FundingInstitution;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FundingInstitutionController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return FundingInstitutionResource::collection(FundingInstitution::all());
    }
}
