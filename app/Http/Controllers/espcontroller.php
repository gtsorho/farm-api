<?php

namespace App\Http\Controllers;

use App\espdata;
use App\Events\MyEvent;
use Illuminate\Http\Request;
use App\permanentespdata;
use App\Http\Resources\espdata as espdataResource;




class espcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //  abort_if($User->id !== auth()->guard('api')->id(), 403);
     $message = espdata::where('user_id', auth()->guard('api')->id())->get();

     $single_data = espdata::latest('user_id', auth()->guard('api')->id())->first();

     $channelkey = espdata::latest('user_id', auth()->guard('api')->id())->first()['user_id'];

     event(new MyEvent(['message'=>$message, 'singleData'=>$single_data, 'status'=>"plural", 'channelkey'=>$channelkey]));

     return new espdataResource([$message, $single_data, $channelkey]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        espdata::create(request()->all() + ['user_id'=>auth()->guard('api')->id()]);
        // $message = espdata::where('user_id', auth()->guard('api')->id())->get();
        $message = espdata::latest('user_id', auth()->guard('api')->id())->first();
        $channelkey = espdata::latest('user_id', auth()->guard('api')->id())->first()['user_id'];

                
        event(new MyEvent(['message'=>$message, 'channelkey'=>$channelkey ,'status'=>"single"]));

        return new espdataResource([$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\espdata  $espdata
     * @return \Illuminate\Http\Response
     */
    public function show(espdata $espdata) 
    {
        // $espdata= espdata::find($id);
        return new espdataResource($espdata);
    }
}
