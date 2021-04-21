<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register','authenticate']]);
    }

    /**
     * @param AuthenticateRequest $request
     *
     * @return JsonResponse
     */
    public function authenticate(AuthenticateRequest $request)
    {
        $credentials = $request->only(['email','password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'error' => 'Incorrect credentials'
            ], 401);
        }

        return response()->json(compact('token'));
    }

    /**
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
        ]);

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        return response()->json(compact('token'));
    }

    public function me()
    {
        $me = auth()->user();

        return response()->json(compact('me'));
    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();

        $token->revoke();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
