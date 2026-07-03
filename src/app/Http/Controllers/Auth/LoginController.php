<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(
            'email',
            'password'
        );

        if (! $token = JWTAuth::attempt($credentials)) {

            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.'
            ], 401);

        }

        return $this->respondWithToken($token, JWTAuth::user());
    }

    private function respondWithToken(string $token, User $user): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'Login successfully.',
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => (int) config('jwt.ttl', 60) * 60,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ],
        ]);
    }
}
