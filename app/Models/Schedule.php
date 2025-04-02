<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'departure_time',
        'arrival_time',
        'goes_back',
        'comes_back',
        'flights_id',
        'condition'
    ];

    protected array $dates = ['comes_back'];


    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flights_id');
    }


    public function spaceship()
    {
        return $this->belongsTo(Spaceship::class);
    }


}
