<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Approval\Models\Modification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ModificationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // get all modifications for projects
        $modifications = Modification::with('modifiable')
            ->where('modifiable_type','=','App\Models\Project')
            ->first();

        return response()->json($modifications);
    }
}
