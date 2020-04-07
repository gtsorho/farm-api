<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class espdata extends Model
{
    public function getRouteKeyName(){
        return 'id';
    }
    
    Protected $fillable = [
        'user_id',
        'temperature',
        'moisture',
        'light',
        'humidity',
        'rain'
    ];

    public $table ="espdata";
    
}
