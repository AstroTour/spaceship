<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardingPass extends Model
{
    use HasFactory;

    protected $fillable = [
        'passenger_id',
        'secret',
        'checked_in'
    ];
}
