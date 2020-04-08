<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('espdata','espcontroller')->parameters(['espdata' => 'espdata']);
Route::post('espdata/user_registration', 'registrationController@userRegistration');
Route::patch('espdata/profile_update/{User}', 'registrationController@profile_update');
Route::post('espdata/logout', 'registrationController@logout');


Route::post('password/email','ForgotPasswordController@sendResetLinkEmail');
Route::post('password/reset','ResetPasswordController@reset')->name('password.reset');


// Route::get('espdata/{espdata}', 'espcontroller@show');