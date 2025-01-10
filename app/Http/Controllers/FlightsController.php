<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Spaceport;
use App\Models\Spaceship;
use App\Models\User;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index()
    {
        return Flight::all();
    }

    public function create() {
        return view('welcome', [
            'spaceships' => Spaceship::all(),
            'spaceports' => Spaceport::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'departure_spaceport_id' => 'required|exists:spaceports,id',
            'destination_spaceport_id' => 'required|exists:spaceports,id',
            'spaceship_id' => 'required|exists:spaceships,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
        ]);

        Flight::create($validated);

        return redirect()->route('flights.create')->with('success', 'Járat sikeresen létrehozva!');
    }
}
