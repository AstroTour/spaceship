<?php

namespace App\Http\Controllers;

use App\Models\Spaceport;
use Illuminate\Http\Request;

class SpaceportsController extends Controller
{
    public function index()
    {
        return Spaceport::all();
    }
}
