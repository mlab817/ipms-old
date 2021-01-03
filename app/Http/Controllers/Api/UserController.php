<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignRoleRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $userRepository;

    protected $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
//        $this->middleware(['auth:api']);
        $this->middleware('admin')->only('update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->userService->all();

        return response()->json(compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return Response
     */
    public function store(StoreUserRequest $request): Response
    {
        $user = $this->userService->create($request->only('name','email','password'));

        return response()->json(compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $user = $this->userService->find($id);

        return response()->json(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->update($request->only('name','email'), $id);

        return response()->json(compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = $this->userService->delete($id);

        return response()->json(['result' => $result, 'message' => 'User successfully deleted']);
    }

    public function syncRoles(Request $request, int $id): UserResource
    {
        $user = User::findOrFail($id);

        $roles = $request->input('roles');

        $user->syncRoles($roles);

        return new UserResource($user);
    }

    public function syncPermissions(Request $request, int $id): UserResource
    {
        $user = User::findOrFail($id);

        $permissions = $request->input('permissions');

        $user->syncPermissions($permissions);

        return new UserResource($user);
    }
}
