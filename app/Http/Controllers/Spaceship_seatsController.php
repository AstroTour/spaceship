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
}
