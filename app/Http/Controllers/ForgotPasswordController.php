<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Resources\espdata;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected function sendResetLinkResponse(Request $Request, $response){

        return new espdata(['message' =>  $response]);

    }

    protected function sendResetLinkFailedResponse(Request $Request, $response){
        return new espdata(['error' =>  $response]);          
    }
}
