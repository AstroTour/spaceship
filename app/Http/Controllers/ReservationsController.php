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
            'total'       => 'required|integer|min:0'
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
            'ticket_type' => $validatedData['ticket_type'],
            'total'       => $validatedData['total'],
        ]);
        
        return response()->json([
            'message' => 'Sikeres foglalás! 🚀',
            'reservation' => $reservation
        ], 201);
    }

    public function getReservationData()
    {
        $userId = auth()->id();
        $now = now();

        $reservations = Reservation::where('user_id', $userId)
            ->whereHas('schedule', function ($query) use ($now) {
                $query->where('arrival_time', '>=', $now);
            })
            ->with([
                'schedule.flight' => function ($query) {
                    $query->with([
                        'destinationSpaceport.planet',
                        'destinationSpaceport',
                        'spaceship.spaceshipSeats'
                    ]);
                },
                'user'
            ])
            ->get();

        if ($reservations->isEmpty()) {
            return response()->json([], 200);
        }

        $results = $reservations->map(function ($reservation) {
            $flight = $reservation->schedule->flight;
            $spaceshipSeats = $flight->spaceship->spaceshipSeats;
            $randomSeat = $spaceshipSeats->isNotEmpty() ? $spaceshipSeats->random()->seat_name : 'Nincs elérhető ülés!';

            return [
                'user_name' => $reservation->user->username,
                'user_email' => $reservation->user->email,
                'reservation_id' => $reservation->id,
                'schedule_id' => $reservation->schedule_id,
                'planet_name' => $flight->destinationSpaceport->planet->name,
                'spaceport_name' => $flight->destinationSpaceport->name,
                'flight_number' => $flight->flight_number,
                'departure_time' => $reservation->schedule->departure_time,
                'arrival_time' => $reservation->schedule->arrival_time,
                'return_time' => $reservation->schedule->comes_back,
                'spaceship_name' => $flight->spaceship->name,
                'seat_name' => $randomSeat,
                'total' => $reservation->total,
                'ticket_type' => $reservation->ticket_type
            ];
        });

        return response()->json($results);
    }

    public function reservationDelete(Request $request)
    {
        $userId = $request->user()->id;
        $now = now();

        $reservation = Reservation::where('user_id', $userId)
            ->whereHas('schedule', function ($query) use ($now) {
                $query->where('departure_time', '>=', $now);
            })
            ->first();

        if (!$reservation) {
            return response()->json(['message' => 'Nincs foglalás!'], 404);
        }

        $reservation->delete();

        return response()->json(['message' => 'Foglalás törlése sikeres!']);
    }

}
