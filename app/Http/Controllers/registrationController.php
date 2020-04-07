<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\espdata;
use Illuminate\Support\Facades\Hash;
class registrationController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function userRegistration(Request $Request)
    {
        $validate= request()->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'surname' =>['required', 'string', 'max:255'],
            'email'  =>  ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'max:10'],
            'town' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
            
        ]);

        
        
    //     $User =  User::create([
    //             'firstName' => $Request['firstName'],
    //             'surname' => $Request['surname'],
    //             'email' => $Request['email'],
    //             'phone' => $Request['phone'],
    //             'town' => $Request['town'],
    //             'password' => Hash::make($Request['password']),
    //         ]);
    //    return new espdata($User);

        // if ($validator->fails())
        // {
        //     return new espdata(['errors'=>$validator->errors()->all()], 422);
        // }

        // $request['password']=Hash::make($request['password']);
        
        User::create($validate);
        return new espdata(['success']);
        
    }

        public function logout(Request $Request){
           $Request->user()->token()-revoke();
        }
}
