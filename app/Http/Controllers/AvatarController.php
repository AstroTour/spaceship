<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    
    public function index()
    {
        return Avatar::all()->map(function ($avatar) {
            return [
                'id' => $avatar->id,
                'url' => url($avatar->image),
            ];
        });
    }

    public function avatarInsert(Request $request){

        $user = $request->user();

        return response()->json([
            'id' => $user->id,
            'username' => $user->username,
            'email' => $user->email,
            'profile_image' => $user->avatar ? url($user->avatar->image) : null,
            'role' => $user->role,
        ]);
    }
}
