<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    
    public function index()
    {
        $images = Avatar::all()->map(function ($image) {
            return [
                'url' => url($image->image),
            ];
        });

        return response()->json($images);
    }
}
