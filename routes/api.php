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

Route::group(['prefix' => 'user'], function () {
    Route::post('register', 'Api\V1\User\Auth\RegisterController@register');
    Route::post('login', 'Api\V1\User\Auth\LoginController@login');
    Route::get('email/verify/{id}', 'Api\V1\User\Auth\VerificationController@verify')->name('api.verification.verify');
    Route::get('email/resend', 'Api\V1\User\Auth\VerificationController@resend')->name('api.verification.resend');
    Route::post('password/email', 'Api\V1\User\Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Api\V1\User\Auth\ResetPasswordController@reset');
    Route::get('profile', 'Api\V1\User\UserController@profile');
    Route::post('profile/update', 'Api\V1\User\UserController@updateProfile');
    Route::post('profile/update/photo', 'Api\V1\User\UserController@updatePhoto');
});

Route::get('users', 'Api\V1\User\UserController@getUsers');


Route::post('hour', 'Api\V1\User\DepartureController@searchHour');
Route::post('owner', 'Api\V1\User\DepartureController@searchOwners');
Route::get('domicile', 'Api\V1\User\DepartureController@getDestination');
ROute::post('check/seat', 'Api\V1\User\SeatController@checkSeat');

Route::get('order', 'Api\V1\User\OrderController@orderByUser');
Route::get('order/all', 'Api\V1\User\OrderController@getAllOrder');
Route::post('order/store', 'Api\V1\User\OrderController@storeOrder');
Route::get('order/{id}/cancel/', 'Api\V1\User\OrderController@cancelorder');
Route::post('order/{id}/update/', 'Api\V1\User\OrderController@updateorder');
Route::get('order/{id}/confirm', 'Api\V1\User\OrderController@confirm');
Route::get('order/arrived', 'Api\V1\User\OrderController@orderArrived');
Route::get('order/verify', 'Api\V1\User\OrderController@orderVerify');

Route::post('snap', 'Api\V1\User\OrderController@snapToken');
Route::post('snap/charge', 'Api\V1\User\OrderController@snapToken');



Route::group(['prefix' => 'driver'], function () {
    Route::post('login', 'Api\V1\Driver\Auth\LoginController@login');
    Route::get('profile', 'Api\V1\Driver\DriverController@profile');

    //Route::post('password/email', 'Api\V1\Driver\Auth\ForgotPasswordController@sendResetLinkEmail');
    //Route::post('password/reset', 'Api\V1\Driver\Auth\ForgotPasswordController@reset')->name('driver.reset.password');
    //Route::post('password/reset', 'Api\V1\Driver\Auth\ResetPasswordController@reset');

    Route::get('/password/reset', 'Api\V1\Driver\Auth\ForgotPasswordController@showLinkRequestForm')->name('driver.password.request');
    Route::post('/password/email', 'Api\V1\Driver\Auth\ForgotPasswordController@sendResetLinkEmail')->name('driver.password.email');
    


    Route::post('profile/update', 'Api\V1\Driver\DriverController@updateProfile');
    Route::post('profile/update/photo', 'Api\V1\Driver\DriverController@updatePhoto');
    Route::get('location/{location}', 'Api\V1\Driver\DriverController@setLocation');
    Route::get('gooff', 'Api\V1\Driver\DriverController@goOff');
});

Route::get('order/driver', 'Api\V1\Driver\OrderController@getOrdersByDriver');
Route::get('order/driver/show', 'Api\V1\Driver\OrderController@getOrder');
Route::get('order/{id}/arrived', 'Api\V1\Driver\OrderController@arrived');
Route::get('order/{id}/done', 'Api\V1\Driver\OrderController@done');

Route::post('try', 'Api\V1\User\TrySnapController@store');
Route::post('try/charge', 'Api\V1\User\TrySnapController@store');

