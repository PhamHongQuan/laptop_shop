<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        /** @var \Laravel\Socialite\Two\AbstractProvider $googleProvider */
        $googleProvider = Socialite::driver('google');
        return $googleProvider
            ->stateless()
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        /** @var \Laravel\Socialite\Two\AbstractProvider $googleProvider */
        $googleProvider = Socialite::driver('google');

        $googleUser = $googleProvider
            ->stateless()
            ->user();


        $user = User::where('google_id', $googleUser->id)
            ->orWhere('email', $googleUser->email)
            ->first();

        if (! $user) {
            $user = User::create([
                'name' => $googleUser->name ?? 'Google User',
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make(Str::random(32)),
                'role' => UserRole::Customer,
            ]);
        } elseif (! $user->google_id) {
            $user->update([
                'google_id' => $googleUser->id,
            ]);
        }

        $token = JWTAuth::fromUser($user);

        return view('auth.google-callback', [
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }
}
