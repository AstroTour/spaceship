<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ApiRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ApiRegisterController extends Controller
{
    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'username' => ['required', 'string'],
                'email' => ['required', 'string', 'lowercase', 'email', 'unique:users,email'],
                'password' => ['required', 'confirmed'],
            ]);
            
            $user = User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        
            Auth::login($user);
        
            return response()->json([
                'status' => true,
                'message' => "Regisztráció sikeres!",
                'user' => $user
            ], 201);
        
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Hiba történt a regisztráció során.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
