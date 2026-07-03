<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function me(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => Auth::user(),
        ]);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json([
            'success' => true,
            'message' => 'Logout successfully.',
        ]);
    }

    public function refresh(): JsonResponse
    {
        $token = Auth::refresh();

        return response()->json([
            'success' => true,
            'message' => 'Token refreshed successfully.',
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => (int) config('jwt.ttl', 60) * 60,
            ],
        ]);
    }
}
