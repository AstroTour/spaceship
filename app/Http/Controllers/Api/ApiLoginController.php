<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(ApiLoginRequest $request)
    {
        /*$request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);*/

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Helytelen hitelesítő adatok!'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
            'message' => 'Bejelentkezés sikeres!',
            'status' => 200,
        ]);
    }



}
