<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after:departure_time',
            'goes_back' => 'required|date',
            'comes_back' => 'required|date|after:goes_back',
            'flight_id' => 'required|exists:flights,id',
        ]);

        DB::table('schedules')->insert([
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'goes_back' => $request->goes_back,
            'comes_back' => $request->comes_back,
            'flights_id' => $request->flight_id,
            'condition' => 'várakozik',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    public function show($id) {

    }

    public function edit($id)
    {

    }
}
