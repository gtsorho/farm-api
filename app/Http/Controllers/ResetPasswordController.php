<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\espdata;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

      
    protected function sendResetResponse(Request $Request, $response){

        return new espdata(['message' =>  trans($response)]);

    }

    protected function sendResetFailedResponse(Request $Request, $response){

        return new espdata(['error' => trans($response)]);
        
    }
}
