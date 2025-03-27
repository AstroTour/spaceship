<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = Gallery::all()->map(function ($image) {
            return [
                'url' => url($image->img),
            ];
        });

        return response()->json($images);
    }
}
