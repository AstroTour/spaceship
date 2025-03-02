<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use Illuminate\Support\Facades\Log;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('flight')->get();
        $flights = Flight::all();

        return view('schedules', compact('schedules', 'flights'));
    }

    public function list()
    {
        return response()->json(Schedule::all());
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'departure_time' => 'required|date|after_or_equal:today',
            'arrival_time' => 'required|date|after:departure_time',
            'goes_back' => 'required|date|after:arrival_time',
            'comes_back' => 'required|date|after:goes_back',
            'flights_id' => 'required|exists:flights,id',
        ]);

        Schedule::create($validated);

        return redirect()->back()->with('success', 'Menetrend sikeresen létrehozva.');

    }

    public function show($id) {

    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->back()->with('success', 'Menetrend sikeresen törölve.');
    }

    public function publicSchedules(): \Illuminate\Database\Eloquent\Collection
    {
        $schedules = Schedule::with([
            'flight.spaceship',
            'flight.departureSpaceport',
            'flight.destinationSpaceport'
        ])
            ->where('departure_time', '>', now())
            ->orderBy('departure_time', 'asc')
            ->get();

        return $schedules;
    }

    public function schedulesDescending(): \Illuminate\Database\Eloquent\Collection
    {

        return Schedule::with([
            'flight.spaceship',
            'flight.departureSpaceport',
            'flight.destinationSpaceport'
        ])
            ->orderBy('departure_time', 'desc')
            ->get();
    }

    public function schedulesAscending(): \Illuminate\Database\Eloquent\Collection
    {

        return Schedule::with([
            'flight.spaceship',
            'flight.departureSpaceport',
            'flight.destinationSpaceport'
        ])
            ->orderBy('departure_time', 'asc')
            ->get();
    }


}
