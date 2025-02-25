<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect()->route('admin');
        }

        return back()->withErrors(['email' => 'Hibás e-mail vagy jelszó!'])->withInput();
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sikeres kijelentkezés.');
    }
}
