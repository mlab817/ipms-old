<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Approval\Models\Modification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function test(): JsonResponse
    {
        // get all modifications for projects
        $modifications = Modification::with('modifiable')
            ->where('modifiable_type','=','App\Models\Project')
            ->first();

        return response()->json($modifications);
    }
}
