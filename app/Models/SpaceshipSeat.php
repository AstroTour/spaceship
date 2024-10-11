<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceshipSeat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'at_window',
        'row',
        'spaceship_id'
    ];
}
