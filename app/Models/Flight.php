<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'to_time',
        'from_time',
        'departure_spaceport_id',
        'destination_spaceport_id',
        'spaceship_id'
    ];
}
