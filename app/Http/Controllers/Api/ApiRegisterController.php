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
    public function register(ApiRegisterRequest $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'lowercase', 'email'],
            'password' => ['required', 'confirmed']
        ]);

        User::create($data);

        return response()->json([
            'status' => true,
            'message' => "Regisztráció sikeres!"
        ]);

    }
}
