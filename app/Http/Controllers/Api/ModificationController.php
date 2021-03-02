<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Approval\Models\Modification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModificationController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        // get all modifications for projects
        $modifications = Modification::with('modifiable','modifier')
            ->where('modifiable_type','=','App\Models\Project')
            ->get();

        return response()->json($modifications);
    }

    public function approve(Modification $modification): JsonResponse
    {
        $userId = Auth::id();
        $approver = User::find($userId);

        $approver->approve($modification);

        return response()->json($modification);
    }

    public function disapprove(Modification $modification): JsonResponse
    {
        $userId = Auth::id();
        $approver = User::find($userId);

        $approver->disapprove($modification);

        return response()->json($modification);
    }
}
