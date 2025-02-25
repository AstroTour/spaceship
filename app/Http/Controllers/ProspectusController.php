<?php

namespace App\Http\Controllers;

use App\Models\Prospectus;
use Illuminate\Http\Request;

class ProspectusController extends Controller
{
    public function index(){
        return Prospectus::all();
    }
}
