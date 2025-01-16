<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Spaceport;
use App\Models\Spaceship;
use App\Models\User;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index()
    {
        return Flight::all();
    }

    public function create()
    {
        return view('welcome', [
            'spaceships' => Spaceship::all(),
            'spaceports' => Spaceport::all(),
            'users' => User::all(),
        ]);
    }

    public function store(Request $request)
    {

    }

}
