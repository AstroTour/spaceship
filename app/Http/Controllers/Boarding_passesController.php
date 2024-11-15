<?php

namespace App\Http\Controllers;

use App\Models\BoardingPass;
use Illuminate\Http\Request;

class Boarding_passesController extends Controller
{
    public function index()
    {
        return BoardingPass::all();
    }
}
