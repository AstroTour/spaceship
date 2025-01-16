<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $flights = DB::table('flights')->select('id', 'flight_number')->get();

        return view('welcome', compact('flights'));
    }

}
