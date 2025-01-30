<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $flights = Flight::all();
        $schedules = Schedule::all();
        return view('admin', compact('users', 'flights', 'schedules'));
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





}
