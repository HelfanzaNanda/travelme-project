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

Route::group(['prefix' => 'user'], function (){
    Route::post('register', 'Api\V1\User\Auth\RegisterController@register');
    Route::post('login', 'Api\V1\User\Auth\LoginController@login');
    Route::get('email/verify/{id}', 'Api\V1\User\Auth\VerificationController@verify')->name('api.verification.verify');
    Route::get('email/resend', 'Api\V1\User\Auth\VerificationController@resend')->name('api.verification.resend');

    /*Route::get('destination', 'Api\V1\User\UserController@getDestination');
    Route::get('departure/{destination}', 'Api\V1\User\UserController@departureByDestination');
    Route::post('departure/search', 'Api\V1\User\UserController@search');
    Route::post('order','Api\V1\User\UserController@order');
    Route::get('order/{user_id}','Api\V1\User\UserController@orderByUser');*/
});

Route::get('users','Api\V1\User\UserController@getUsers');
Route::get('user/{api_token}','Api\V1\User\UserController@getUserLogIn');

Route::get('destination', 'Api\V1\User\UserController@getDestination');
Route::get('departure/{destination}', 'Api\V1\User\UserController@departureByDestination');
Route::post('departure/search', 'Api\V1\User\UserController@search');
Route::get('order','Api\V1\User\UserController@orderByUser');
Route::post('order/store','Api\V1\User\UserController@order');
Route::get('order/all', 'Api\V1\User\UserController@getAllOrder');

Route::group(['prefix' => 'driver'], function (){
   Route::post('login', 'Api\V1\Driver\Auth\LoginController@login');
});

Route::get('order/driver', 'Api\V1\Driver\DriverController@order');