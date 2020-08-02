<?php

namespace App\Http\Controllers;

use DB;
use App\espdata;
use carbon\carbon;
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
     $message = espdata::latest('user_id', auth()->guard('api')->id())->take(20)->get();

     $single_data = espdata::latest('user_id', auth()->guard('api')->id())->first();

     $channelkey = espdata::latest('user_id', auth()->guard('api')->id())->first()['user_id'];

    //  $average = espdata::where('created_at', '<', Carbon::now()->subMinutes(5)->toDateTimeString());

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
        
        $message = espdata::create(request()->all() + ['user_id'=>auth()->guard('api')->id()]);
        // $message = espdata::where('user_id', auth()->guard('api')->id())->get();
        // $message = espdata::latest('user_id', auth()->guard('api')->id())->first();
        $channelkey = espdata::latest('user_id', auth()->guard('api')->id())->first()['user_id'];

                
        event(new MyEvent(['message'=>$message, 'channelkey'=>$channelkey ,'status'=>"single"]));

        return new espdataResource([$message]);
    }
    
    public function avg(espdata $espdata){
        $today = carbon::now();
        $parseToday = carbon::parse($today);
        $todayYear = $parseToday->year;
        $todayMonth = $parseToday->month;
        $todayDay =$parseToday->day;

        $averageData = \collect(); 
        $dateData = \collect();

        for($day = 1; $day <= $todayDay; $day++ ){
            $message = espdata::select(DB::raw('avg(rain) rainAvg, avg(light) lightAvg, avg(moisture) moistureAvg, avg(temperature) temperatureAvg, avg(humidity) humidityAgv'))->whereDate('created_at', $todayYear.'-'.$todayMonth.'-'.$day)->get();
            $sendDate = $todayYear.'-'.$todayMonth.'-'.$day ;
            $dateData->push($sendDate);
            $averageData->push($message);
    

        }
         
        $monthlyAgerage =espdata::select(DB::raw('avg(rain) rainAvg, avg(light) lightAvg, avg(moisture) moistureAvg, avg(temperature) temperatureAvg, avg(humidity) humidityAgv'))->whereYear('created_at', $todayYear)->whereMonth('created_at', $todayMonth)->get();
        
        return response()->json(['averageData' => $averageData, 'dateData'=>$dateData, 'monthlyMessage'=>$monthlyAgerage]);
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
