<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        // this should not work since the relationship is only HasOne
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return ProfileResource
     */
    public function store(Request $request, User $user): ProfileResource
    {
        $profile = Profile::make($request->only(
            'nickname',
            'avatar',
            'office_id'));
        $user->profile()->save($profile);

        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return ProfileResource
     */
    public function show(User $user): ProfileResource
    {
        return new ProfileResource($user->profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return ProfileResource
     */
    public function update(Request $request, User $user): ProfileResource
    {
        $data = $request->only('nickname', 'avatar', 'office_id');
        $user->profile->update($request->only(
            'nickname',
            'avatar',
            'office_id'));

        return new ProfileResource($user->profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->profile()->delete();

        return response()->json([
            'message' => 'Successfully deleted profile'
        ], 204);
    }
}
