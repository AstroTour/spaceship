<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoginController extends Controller
{
    public function login(ApiLoginRequest $request){

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Helytelen hitelesítő adatok!'], 401);
    }

    $user = Auth::user();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => [
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name ?? '',
            'role' => $user->role ?? 'user',
        ],
        'message' => 'Bejelentkezés sikeres!',
        'status' => 200,
    ], 200)->withCookie(cookie('auth_token', $token, 60 * 24, '/', null, false, true));
    }

    public function logout(Request $request)
    {
        // Az aktuális felhasználó összes tokenjének törlése
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Sikeres kijelentkezés!',
            'status' => 200,
        ], 200);
    }

}
