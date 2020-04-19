<?php

namespace App\Http\Controllers;

use App\User;
use Validator; 
use Illuminate\Http\Request;
use App\Http\Resources\espdata;
use Illuminate\Support\Facades\Hash;
class registrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')
             ->only(['profile_update', 'logout', 'user']);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function userRegistration(Request $Request)
    {
        $validator = Validator::make($Request->all(), [ 
            'firstName' => ['required', 'string', 'max:255'],
            'surname' =>['required', 'string', 'max:255'],
            'email'  =>  ['required', 'string', 'email', 'unique:users'],
            'phone' => ['required', 'string', 'max:10'],
            'town' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
            
        ]);



          if ($validator->fails())
        {
            return new espdata(['errors'=>$validator->errors()->all(),'status'=>"error"]);
        }
        
        $User =  User::create([
                'firstName' => $Request['firstName'],
                'surname' => $Request['surname'],
                'email' => $Request['email'],
                'phone' => $Request['phone'],
                'town' => $Request['town'],
                'password' => Hash::make($Request['password']),
            ]);

       return new espdata(['data'=>$User, 'status'=>"success"]);

    }

    public function user()
    {
        $User = User::where('id', auth()->guard('api')->id())->get();
        return response()->json($User);
    }

    public function login()
    {
        $client_id = config('services.passport.client_id');
        $client_secret = config('services.passport.client_secret');
        return response()->json(['client_secret'=>$client_secret, 'client_id'=>$client_id]);
        // return new espdata([$client_secret, $client_id]);
        // dd($client_secret);
    }

    public function profile_update(Request $Request, User $User)
    {

        abort_if($User->id !== auth()->guard('api')->id(), 403);

        $validator = Validator::make($Request->all(), [ 
            'firstName' => ['string','required','min:3','max:255'],
            'surname' =>['string','required', 'min:3','max:255'],
            'email'  =>  ['string','email'],
            'password' => ['required', 'string', 'min:8', 'confirmed']     
        ]);

        if ($validator->fails())
        {
            return new espdata(['errors'=>$validator->errors()->all(),'status'=>"error"]);
        }
        
        $Request['password']= Hash::make($Request['password']);
        $User->update($Request->all());

        return new espdata(['data'=> $User,'status'=> "success"]);

    }
    public function logout(Request $Request)
    {
	        $result = $Request->user()->token()->revoke();                  
            if($result){
                    $response = response()->json(['error'=>false,'message'=>'User logout successfully.','result'=>[]],200);
              }else{
                    $response = response()->json(['error'=>true,'message'=>'Something is wrong.','result'=>[]],400);            
              }   
            return $response;       
    
        
    }

}
