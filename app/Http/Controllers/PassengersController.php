<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;

class PassengersController extends Controller
{
    public function index()
    {
        return Passenger::all();
    }
}
