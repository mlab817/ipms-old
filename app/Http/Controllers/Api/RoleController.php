<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(): JsonResponse
    {
        $roles = Role::all();

        return response()->json(compact('roles'));
    }

    public function show(string $name): JsonResponse
    {
        $role = Role::findByName($name);

        return response()->json(compact('role'));
    }

    public function store(Request $request): JsonResponse
    {
        $role = Role::make([
            'name' => $request->input('role')
        ]);
        $role->saveOrFail();

        return response()->json(compact('role'));
    }

    public function update(Request $request, string $name): JsonResponse
    {
        $role = Role::findByName($name);

        $role->name = $request->input('role');

        $role->save();

        return response()->json(compact('role'));
    }

    public function destroy(string $name): JsonResponse
    {
        $role = Role::findByName($name);

        try {
            $role->delete();
        } catch (\Exception $e) {
            abort($e->getCode(), $e->getMessage());
        }
        return response()->json(null,204);
    }

    public function syncPermissions(Request $request, string $name): JsonResponse
    {
        $role = Role::findByName($name);

        $permissions = $request->input('permissions');

        $role->syncPermissions($permissions);

        return response()->json(compact('role'));
    }
}
