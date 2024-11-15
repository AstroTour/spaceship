<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceshipSeat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seat_name',
        'at_window',
        'spaceship_id'
    ];
}
