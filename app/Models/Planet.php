<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'information'
    ];

    public function spaceports()
    {
        return $this->hasMany(Spaceport::class, 'planet_id');
    }
}
