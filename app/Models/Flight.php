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



    public function spaceship()
    {
        return $this->belongsTo(Spaceship::class, 'spaceship_id');
    }

    public function departureSpaceport()
    {
        return $this->belongsTo(Spaceport::class, 'departure_spaceport_id');
    }

    public function destinationSpaceport(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Spaceport::class, 'destination_spaceport_id');
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flights_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'flights_id');
    }
}
