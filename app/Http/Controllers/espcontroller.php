<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\espdata;
use carbon\carbon;
use App\Events\MyEvent;
use Illuminate\Http\Request;
use App\permanentespdata;
// use Illuminate\Support\Collection;
use App\Notifications\userNotification;
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
    //  $message = espdata::latest('user_id', auth()->guard('api')->id())->orderBy('id', 'desc')->take(20)->get();
     $message = espdata::latest('user_id', auth()->guard('api')->id())->orderBy('id')->take(20)->get();
    

     $single_data = espdata::latest('user_id', auth()->guard('api')->id())->orderBy('id','dsec')->first();

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
        $channelkey = espdata::latest('user_id', auth()->guard('api')->id())->first()['user_id'];

        $today = carbon::now();
        $parseToday = carbon::parse($today);
        $todayYear = $parseToday->year;
        $todayMonth = $parseToday->month;
        
        $moist = request(['moisture']);        
        $monthlyAgerage =espdata::select(DB::raw('avg(rain) rainAvg, avg(light) lightAvg, avg(moisture) moistureAvg, avg(temperature) temperatureAvg, avg(humidity) humidityAgv'))->whereYear('created_at', $todayYear)->whereMonth('created_at', $todayMonth)->get();
        if($moist <= $monthlyAgerage){
            $user = User::latest('id', auth()->guard('api')->id())->first();
            $user->notify(new userNotification($moist['moisture']));
        }
        // return response()->json(['moist' => $moist, 'monthlyMessage'=>$monthlyAgerage]);

        event(new MyEvent(['message'=>$message, 'channelkey'=>$channelkey ,'status'=>"single"]));
        return new espdataResource([$monthlyAgerage]);
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
        
        $user = User::latest('id', auth()->guard('api')->id())->first();

        return response()->json(['averageData' => $averageData, 'dateData'=>$dateData, 'monthlyMessage'=>$monthlyAgerage, 'user'=>$user]);

        // $espdata= espdata::find($id);
        // return new espdataResource($espdata);
    }
}
