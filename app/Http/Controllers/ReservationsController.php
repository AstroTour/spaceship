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
        $validatedData = $request->validate([
            'planet_id'       => 'required|exists:planets,id',
            'schedule_id'     => 'required|exists:schedules,id',
            'ticket_type'     => 'required|in:Basic,VIP',
            'at_window'       => 'required|boolean',
            'seat'            => 'nullable|boolean',
        ]);
        
        if ($validatedData['at_window'] == 1) {
            if (!$this->checkWindowSeatAvailability($validatedData['schedule_id'])) {
                return redirect()->back()->withErrors([
                    'at_window' => 'Nincs több ablak melletti szabad hely!'
                ])->withInput();
            }
        }
        
        $ticketType = $this->validateTicketType($validatedData['ticket_type']);
        
        $seatValue = $validatedData['at_window']; // Ha at_window = 1, akkor seat is 1 lesz
 
        $reservation = Reservation::create([
            'seat'          => $seatValue,
            'schedule'      => $validatedData['schedule_id'],
            'user'          => auth()->user()->id,
            'ticket_type'   => $ticketType
        ]);
        
        return redirect()->back()->with('success', 'Sikeres foglalás!');
    }

    public function checkWindowSeatAvailability($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);

        $flight = $schedule->flight;
        $spaceship = $flight->spaceship;

        $availableWindowSeats = SpaceshipSeat::where('spaceship_id', $spaceship->id)
            ->where('at_window', 1)
            ->count();

        $reservedWindowSeats = Reservation::where('schedule', $schedule->id)
            ->where('at_window', 1)
            ->count();

        return ($reservedWindowSeats < $availableWindowSeats);
    }

    public function validateTicketType($ticketType)
    {
        if (!in_array($ticketType, ['Basic', 'VIP'])) {
            abort(400, 'Érvénytelen jegy típus!');
        }
        return $ticketType;
    }

    public function userDataInsert(){
        
    $user = Auth::user();
    
    if (!$user) {
        return response()->json(['error' => 'Not authenticated'], 401);
    }

    return response()->json([
        'username' => $user->username,
        'email'    => $user->email,
    ]);
    }

}
