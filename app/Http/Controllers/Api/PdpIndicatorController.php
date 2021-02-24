<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PdpIndicatorResource;
use App\Models\PdpIndicator;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PdpIndicatorController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $indicators = PdpIndicator::where('id','<=',20)->with(['children' => function($q) {
            $q->with('children');
        }, 'parent' => function ($q) {
            $q->with('parent');
        }])->get();

        return PdpIndicatorResource::collection($indicators);
    }
}
