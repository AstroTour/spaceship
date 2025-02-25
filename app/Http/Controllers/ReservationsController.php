<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /*public function index()
    {
        $reservations = Reservation::with(['user', 'flight.schedule'])
            ->get();

        return view('reservations', compact('reservations'));
    }*/
}
