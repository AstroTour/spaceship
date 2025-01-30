<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaceship extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'information',
        'capacity'
    ];

    public function seats()
    {
        return $this->hasMany(SpaceshipSeat::class, 'spaceship_id');
    }
}
