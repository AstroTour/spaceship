<?php

namespace App\Http\Controllers;

use App\Models\SpaceshipSeat;
use Illuminate\Http\Request;

class Spaceship_seatsController extends Controller
{
    public function index()
    {
        return SpaceshipSeat::all();
    }

    public function show ($seat_name, $spaceship_id)
    {
        $spaceshipSeat = SpaceshipSeat::where('seat_name', $seat_name)
            ->where('spaceship_id', $spaceship_id)
            ->get();
        return $spaceshipSeat[0];
    }

}
