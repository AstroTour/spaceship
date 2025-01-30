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



}
