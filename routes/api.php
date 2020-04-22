<?php

use Illuminate\Http\Request;
use App\Events\MyEvent;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api','cors:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['cors']], function ($router) {});

Route::get('login', 'registrationController@login');
Route::get('espdata/user', 'registrationController@user');


Route::resource('espdata','espcontroller')->parameters(['espdata' => 'espdata']);
Route::post('espdata/user_registration', 'registrationController@userRegistration');
Route::patch('espdata/profile_update/{User}', 'registrationController@profile_update');
Route::post('espdata/logout', 'registrationController@logout');
// Route::get('try', 'espcontroller@try');




Route::post('password/email','ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset','ResetPasswordController@reset')->name('password.reset');

// Route::get('/pusher_esp', function () {
//     $message = "farm api pusher working";
//     event(new MyEvent($message));
//     return $message;
// });

// Route::get('espdata/{espdata}', 'espcontroller@show');