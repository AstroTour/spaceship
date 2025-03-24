<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use App\Models\SpaceshipSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function index()
    {
        return Reservation::all();
    }

    public function schedulesForPlanet(Request $request)
    {
        $planetId = $request->planet_id;
        $currentDateTime = now();

        $schedules = DB::table('schedules')
            ->join('flights', 'schedules.flights_id', '=', 'flights.id')
            ->join('spaceports', 'flights.destination_spaceport_id', '=', 'spaceports.id')
            ->where('spaceports.planet_id', $planetId)
            ->where('schedules.departure_time', '>', $currentDateTime)
            ->select('schedules.*')
            ->get();

        return response()->json($schedules);
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Felhasználó nincs bejelentkezve!'], 401);
        }
    
        // Felhasználói ID kinyerése az autentikációból
        $userId = auth()->id();
        
        $validatedData = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'ticket_type' => 'required|in:Basic,VIP',
            'seat'        => 'required|boolean', // true = ablak melletti, false = folyosó melletti
        ]);
    
        // Ha ablak melletti helyet kér (seat = true), ellenőrizni kell a foglaltságot
        if ($validatedData['seat']) {
            $schedule = Schedule::findOrFail($validatedData['schedule_id']);
            $flight = $schedule->flight;
            $spaceship = $flight->spaceship;
    
            $availableWindowSeats = SpaceshipSeat::where('spaceship_id', $spaceship->id)
                ->where('at_window', 1)
                ->count();
    
            $reservedWindowSeats = Reservation::where('schedule_id', $validatedData['schedule_id'])
                ->where('seat', 1) // 1 = ablak melletti
                ->count();
    
            if ($reservedWindowSeats >= $availableWindowSeats) {
                return response()->json([
                    'message' => 'Nincs több ablak melletti szabad hely!',
                ], 400);
            }
        }
    
        // Új foglalás mentése
        $reservation = Reservation::create([
            'schedule_id' => $validatedData['schedule_id'],
            'user_id'     => auth()->id(),
            'seat'        => $validatedData['seat'],
            'ticket_type' => $validatedData['ticket_type']
        ]);
        
        return response()->json([
            'message' => 'Sikeres foglalás! 🚀',
            'reservation' => $reservation
        ], 201);
    }

}
