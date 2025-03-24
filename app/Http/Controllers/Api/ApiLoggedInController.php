<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiLoggedInController extends Controller
{
    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        Auth::guard('web')->logout(); // SESSION logout!

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'status' => true,
            'message' => 'Kijelentkezés sikeres!'
        ]);
    }
}
