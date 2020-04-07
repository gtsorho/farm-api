<?php

namespace App\Http\Controllers;

use App\espdata;
use App\Http\Resources\espdata as espdataResource;
use Illuminate\Http\Request;

class espcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $espdata = espdata::all();
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
        
        espdata::create(request()->all());
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



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\espdata  $espdata
     * @return \Illuminate\Http\Response
     */
    public function destroy(espdata $espdata)
    {
        //
    }
}
