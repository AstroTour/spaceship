<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spaceport extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'planet_id'
    ];
}
