<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permanentespdata extends Model
{
    public $table = "permanentespdata";
    
    
    Protected $fillable = [
        'user_id',
        'temperature',
        'moisture',
        'light',
        'humidity',
        'rain'
    ];
}
