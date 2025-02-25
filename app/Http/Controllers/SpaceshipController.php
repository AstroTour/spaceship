<?php

namespace App\Http\Controllers;

use App\Models\Spaceship;
use Illuminate\Http\Request;

class SpaceshipController extends Controller
{

    public function index()
    {
        $spaceships = Spaceship::all();

        return view('spaceships', compact('spaceships'));
    }




    public function spaceshipsWithSeats()
    {
        $spaceships = Spaceship::with('seats')
            ->get();
        return $spaceships;
    }
}
