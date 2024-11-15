<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    public function index()
    {
        return Flight::all();
    }
}
