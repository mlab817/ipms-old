<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(): JsonResponse
    {
        $permissions = Permission::all();

        return response()->json(compact('permissions'));
    }

    public function show(Permission $permission): JsonResponse
    {
        return response()->json(compact('permission'));
    }

    public function store(Request $request): JsonResponse
    {
        $permission = Permission::make([
            'name' => $request->input('permission')
        ]);

        $permission->saveOrFail();

        return response()->json(compact('permission'));
    }

    public function update(Request $request, Permission $permission): JsonResponse
    {
        $permission->name = $request->input('permission');
        $permission->save();

        return response()->json(compact('permission'));
    }

    public function destroy(Permission $permission): JsonResponse
    {

        try {
            $permission->delete();
        } catch (\Exception $e) {
            abort($e->getCode(), $e->getMessage());
        }

        return response()->json(null, 204);
    }
}
