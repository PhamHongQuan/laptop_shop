<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Services\AuthService;
use App\Http\Requests\RegisterRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function index()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->authService->register($request->validated());
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => true,
            'message' => 'Register successfully.',
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => (int) config('jwt.ttl', 60) * 60,
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
            ]
        ]);
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        return $this->register($request);
    }
}
