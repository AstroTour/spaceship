<?php

namespace App\Http\Controllers;

use App\Models\Spaceship;
use Illuminate\Http\Request;

class SpaceshipController extends Controller
{
    public function index()
    {
        return Spaceship::all();
    }
}
