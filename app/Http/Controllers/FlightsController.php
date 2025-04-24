<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Spaceport;
use App\Models\Spaceship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlightsController extends Controller
{
    public function index()
    {
        return Flight::all();
    }

    public function create()
    {
        return view('welcome', [
            'spaceships' => Spaceship::all(),
            'spaceports' => Spaceport::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {

    }

    public function flightsWithSchedules()
    {
        $flights = Flight::with('schedules')
            ->get();
        return $flights;
    }

    public function flightsAndSchedules(Request $request)
    {
        $flights = DB::table('flights as f')
            ->join('schedules as s', 'f.id', '=', 's.flights_id')
            ->join('spaceports as sp', 'f.destination_spaceport_id', '=', 'sp.id')
            ->join('planets as p', 'sp.planet_id', '=', 'p.id')
            ->where('s.departure_time', '>', now())
            ->select(
                'f.flight_number',
                's.departure_time',
                'f.to_time',
                's.arrival_time',
                's.goes_back',
                'f.from_time', 
                's.comes_back',
                'sp.name as port',
                'p.name as planet',
            )
            ->get();

        return response()->json($flights);
    }

}
