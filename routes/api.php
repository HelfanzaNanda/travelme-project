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
    Route::get('profile','Api\V1\User\UserController@profile');
    Route::post('profile/update','Api\V1\User\UserController@updateprofile');
});

Route::get('users','Api\V1\User\UserController@getUsers');

Route::get('destination/tegal', 'Api\V1\User\DepartureController@getDestinationTegal');
Route::get('destination/other','Api\V1\User\DepartureController@getDestinationOther');

Route::get('departure/{destination}', 'Api\V1\User\DepartureController@departureByDestination');
Route::post('departure/search', 'Api\V1\User\DepartureController@searchOwner');

Route::get('order','Api\V1\User\OrderController@orderByUser');
Route::get('order/all', 'Api\V1\User\OrderController@getAllOrder');
Route::post('order/store','Api\V1\User\OrderController@postOrder');
Route::get('order/{id}/cancel/', 'Api\V1\Order\UserController@cancelorder');
Route::get('order/{id}/update/', 'Api\V1\Order\UserController@updateorder');

Route::post('snap', 'Api\V1\User\OrderController@snapToken');
Route::post('snap/charge', 'Api\V1\User\OrderController@snapToken');


Route::group(['prefix' => 'driver'], function (){
   Route::post('login', 'Api\V1\Driver\Auth\LoginController@login');
   Route::get('profile', 'Api\V1\Driver\DriverController@profile');
   Route::post('profile', 'Api\V1\Driver\DriverController@updateProfile');
});

Route::get('order/driver', 'Api\V1\Driver\OrderController@getOrdersByDriver');
Route::get('order/{id}/arrived', 'Api\V1\Driver\OrderController@arrived');
Route::get('order/{id}/done', 'Api\V1\Driver\OrderController@done');

Route::post('try','Api\V1\User\TrySnapController@store');
Route::post('try/charge','Api\V1\User\TrySnapController@store');