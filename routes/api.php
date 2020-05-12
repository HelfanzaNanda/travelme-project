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
    Route::get('','Api\V1\User\UserController@getUsers');
    Route::get('{api_token}','Api\V1\User\UserController@getUserLogIn');


    Route::get('destination', 'Api\V1\User\UserController@getDestination');
    Route::get('departure/{destination}', 'Api\V1\User\UserController@departureByDestination');
    Route::post('departure/search', 'Api\V1\User\UserController@search');
    Route::post('order','Api\V1\User\UserController@order');
});
