<?php

namespace App\Http\Controllers;

use App\espdata;
use App\Http\Resources\espdata as espdataResource;
use Illuminate\Http\Request;

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
     $espdata = espdata::where('user_id', auth()->guard('api')->id())->get();

     return espdataResource::collection($espdata);
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

        return new espdataResource(['data stored']);
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
