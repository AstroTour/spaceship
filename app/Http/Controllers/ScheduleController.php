<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
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
        $validated = $request->validate([
            'departure_time' => 'required|date',
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
}
