<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PdpChapterResource;
use App\Http\Resources\ProjectCollection;
use App\Models\PdpChapter;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PdpChapterController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return PdpChapterResource::collection(PdpChapter::all());
    }

    public function show(PdpChapter $pdpChapter): ProjectCollection
    {
        $projects = $pdpChapter->projects()->paginate();

        return new ProjectCollection($projects);
    }
}
