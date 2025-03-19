<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //return response()->json($users);
        return view('admin', compact('users'));
    }



    public function store(Request $request): void
    {
        $record = new User();
        $record->fill($request->all());
        $record->save();
    }


    public function show(string $id)
    {
        return User::find($id);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'username' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8',
        ]);

        $user = Auth::user();

        if ($request->has('username')) {
            $user->username = $validated['username'];
        }
        if ($request->has('email')) {
            $user->email = $validated['email'];
        }
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json(['message' => 'Profil módosítva!']);
        
        /*$record = User::find($id);
        $record->fill($request->all());
        $record->save();*/
    }

    public function profileView(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        $user = Auth::user();

        return $user;
    }

    public function userDataInsert()
    {
    $user = Auth::user();
    
    if (!$user) {
        return response()->json(['error' => 'Not authenticated'], 401);
    }

    return response()->json([
        'username' => $user->username,
        'email'    => $user->email,
    ]);
    }

}
