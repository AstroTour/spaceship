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
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'goes_back' => 'required|date|after:arrival_time',
            'comes_back' => 'required|date|after:goes_back',
            'flights_id' => 'required|exists:flights,id',

        ]);

        Flight::create($validated);

        return redirect()->route('flights.create')->with('success', 'Járat sikeresen létrehozva!');
    }
}
