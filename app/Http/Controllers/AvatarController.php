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
}
