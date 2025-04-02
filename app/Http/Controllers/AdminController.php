<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Reservation;
use App\Models\Schedule;
use App\Models\Spaceship;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();


        if ($users->isEmpty()) {
            dd('❌ Hiba: Nincsenek felhasználók az adatbázisban!');
        }

        return view('admin')
            ->with('users', $users);
    }


    public function userSearch(Request $request)
    {
        $kereso = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $kereso->where('username', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('role', 'LIKE', "%{$search}%");
        }

        $users = $kereso->get();

        return view('admin', compact('users'));
    }



    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('success1', 'Jogosultság sikeresen frissítve.');
    }

    public function usersWithReservations()
    {
        $users = User::with([
            'reservations.schedule.flight.spaceship',
            'reservations.schedule.flight.departureSpaceport',
            'reservations.schedule.flight.destinationSpaceport'
        ])
            ->get();
        return $users;
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $userDel = User::findOrFail($id);
        $userDel->delete();
        return redirect()->back()->with('success2', 'Felhasználó sikeresen törölve.');
    }


    public function adminSchedulesCreate(Request $request)
    {
        $validated = $request->validate([
            'departure_time' => 'required|date|after_or_equal:today',
            'arrival_time' => 'required|date|after:departure_time',
            'goes_back' => 'required|date|after:arrival_time',
            'comes_back' => 'required|date|after:goes_back',
            'flights_id' => 'required|exists:flights,id',
            'spaceship_id' => 'required|exists:spaceships,id',
        ]);
    
    
    
        Schedule::create($validated);
    
        return redirect()->back()->with('success', 'Járat sikeresen létrehozva.');
    }

    public function adminSchedules()
    {
        $schedules = Schedule::with('flight')->get();
        $flights = Flight::all();
        $spaceships = Spaceship::all();

        return view('schedules', compact('schedules', 'flights', 'spaceships'));
    }

    public function adminScheduleDestroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        return redirect()->back()->with('success', 'Menetrend sikeresen törölve.');
    }

    public function adminSchedulesCleanup(Request $request)
    {
        $toDelete = Schedule::where('comes_back', '<', now())->count();
        Log::info("Lejárt menetrendek száma: " . $toDelete);

        if ($toDelete > 0) {
            $deletedCount = Schedule::where('comes_back', '<', now())->delete();
            Log::info("$deletedCount menetrend törölve.");
        } else {
            Log::info("Nem volt lejárt menetrend.");
        }

        return redirect()->back()->with('success', "$toDelete menetrend sikeresen törölve.");
    }

    public function adminReservations()
    {
        $reservations = Reservation::with(['user', 'flight.schedule'])
            ->get();

        return view('reservations', compact('reservations'));
    }


    public function adminSpaceships()
    {
        $spaceships = Spaceship::all();

        return view('spaceships', compact('spaceships'));
    }

    public function adminSpaceshipsCreate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:spaceships,name',
            'information' => 'required|string',
            'capacity' => 'required|integer|min:1|max:15', // unsignedSmallInteger határa
        ]);

        Spaceship::create($validatedData);

        return redirect()->back()->with('success5', 'Űrhajó sikeresen létrehozva.');
    }



}
