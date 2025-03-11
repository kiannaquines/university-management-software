<?php

namespace App\Application\Http\Controllers\Api;

use App\Domains\User\Entities\User;
use App\Mail\PasswordResetMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ApiAuthController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request) : JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request) : JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request) : JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function confirm(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'token' => 'required|string',
        ]);

        $user = User::where('confirmation_token', $validated['token'])->first();

        if (!$user) {
            return response()->json(['message' => 'Sorry, you have an invalid token.'], 401);
        }

        $user->confirmation_token = null;
        $user->email_verified_at = now();
        $user->save();

        return response()->json(['message' => 'Your account has been confirmed.']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function forgot(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $validated['email'])->first();

        $token = Str::random(60);
        $user->password_reset_token = $token;
        $user->save();

        Mail::to($user->email)->send(new PasswordResetMail($user, $token));

        return response()->json([
            'message' => 'We have sent you a link to reset your password.',
        ]);
    }

    /**
     * Reset the user's password using a token.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function reset(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'token' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('password_reset_token', $validated['token'])->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid or expired reset token.'], 401);
        }

        $user->password = Hash::make($validated['password']);
        $user->password_reset_token = null;
        $user->save();

        return response()->json(['message' => 'Your password has been reset successfully.']);
    }
}
