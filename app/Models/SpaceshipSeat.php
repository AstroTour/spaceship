<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpaceshipSeat extends Model
{
    use HasFactory;

    protected $fillable = [
        'seat_name',
        'at_window',
        'spaceship_id'
    ];

    protected function setKeysForSaveQuery($query){
        $query
            ->where('seat_name', '=', $this->getAttribute('seat_name'))
            ->where('spaceship_id', '=', $this->getAttribute('spaceship_id'));
        return $query;
    }

    public function spaceship()
    {
        return $this->belongsTo(Spaceship::class, 'spaceship_id');
    }
}
