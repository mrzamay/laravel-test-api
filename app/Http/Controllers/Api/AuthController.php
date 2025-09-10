<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequests;
use App\Http\Requests\StoreUserRequests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginUserRequests $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        return response()->json(['message' => $user,
            'token' => $user->createToken("Token of user: {$user->name}")->plainTextToken
        ], 200);
//        $token = $user->createToken('token')->plainTextToken;
    }

    public function register(StoreUserRequests $request)
    {
        User::create($request->all());
        return "User Created";
    }

    public function logout()
    {
        return "logout";
    }
}
