<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('driver/password/reset/{token}', 'Api\V1\Driver\Auth\ResetPasswordController@showResetForm')->name('driver.password.reset');
Route::post('/driver/password/reset', 'Api\V1\Driver\Auth\ResetPasswordController@reset')->name('driver.password.reset.submit');

Route::post('/finish', function(){
    return redirect()->route('welcome');
})->name('donation.finish');

//Route::post('notification/handler', 'Api\V1\User\OrderController@notificationHandler')->name('notification.handler');

Route::get('', function (){
    return view('landing-page');
});

Route::group(['prefix' => 'admin'], function (){
    Route::get('', function (){
        return redirect()->route('admin.dashboard');
    });

    Route::get('/login', 'Web\Admin\AuthController@getLogin')->name('admin.login');
    Route::post('/login', 'Web\Admin\AuthController@login')->name('admin.login.submit');
    Route::get('/logout', 'Web\Admin\AuthController@logout')->name('admin.logout');

    Route::get('dashboard', 'Web\Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('owner','Web\Admin\OwnerController@index')->name('admin.owner.index');
    Route::get('owner/{id}/destroy','Web\Admin\OwnerController@destroy')->name('admin.owner.destroy');
    Route::get('owner/{id}/show','Web\Admin\OwnerController@show')->name('admin.owner.show');

    Route::get('notification','Web\Admin\NotificationController@index')->name('admin.notification.index');
    Route::get('notification/{id}/update', 'Web\Admin\NotificationController@update')->name('notification.update');
    Route::get('notification/{id}/destroy', 'Web\Admin\NotificationController@destroy')->name('notification.destroy');

    Route::get('travel', 'Web\Admin\TravelController@index')->name('admin.travel.index');
    Route::get('travel/create', 'Web\Admin\TravelController@create')->name('admin.travel.create');
    Route::post('travel/store', 'Web\Admin\TravelController@store')->name('admin.travel.store');
    Route::get('travel/{id}/edit', 'Web\Admin\TravelController@edit')->name('admin.travel.edit');
    Route::patch('travel/{id}/update', 'Web\Admin\TravelController@update')->name('admin.travel.update');
    Route::get('travel/{id}/destroy', 'Web\Admin\TravelController@destroy')->name('admin.travel.destroy');
});

Route::group(['prefix' => 'travel'], function (){
    //Auth owner
    Route::get('/login', 'Web\Owner\Auth\LoginController@getLogin')->name('owner.login');
    Route::post('/login', 'Web\Owner\Auth\LoginController@login')->name('owner.login.submit');
    Route::get('/register', 'Web\Owner\Auth\RegisterController@getRegister')->name('owner.register');
    Route::post('/register', 'Web\Owner\Auth\RegisterController@register')->name('owner.register.submit');
    Route::get('/logout', 'Web\Owner\Auth\LoginController@logout')->name('owner.logout');
    Route::get('/activate', 'Web\Owner\Auth\ActivationController@activate')->name('owner.activate');
    Route::get('/password/reset', 'Web\Owner\Auth\ForgotPasswordController@showLinkRequestForm')->name('owner.password.request');
    Route::post('/password/email', 'Web\Owner\Auth\ForgotPasswordController@sendResetLinkEmail')->name('owner.password.email');
    Route::get('/password/reset/{token}', 'Web\Owner\Auth\ResetPasswordController@showResetForm')->name('owner.password.reset');
    Route::post('/password/reset', 'Web\Owner\Auth\ResetPasswordController@reset')->name('owner.password.reset.submit');


    Route::get('/dashboard', 'Web\Owner\DashboardController@index')->name('owner.dashboard');
    Route::post('/dashboard/balance/take', 'Web\Owner\DashboardController@take')->name('owner.take.balance');
    Route::get('/dashboard/chart', 'Web\Owner\DashboardController@chart')->name('owner.dashboard.chart');


    Route::resource('driver', 'Web\Owner\DriverController')->except('destroy');
    Route::get('driver/{driver}/destroy', 'Web\Owner\DriverController@destroy')->name('driver.destroy');

    Route::resource('car', 'Web\Owner\CarController')->except('destroy');
    Route::get('car/{id}/destroy', 'Web\Owner\CarController@destroy')->name('car.destroy');

    Route::resource('schedule', 'Web\Owner\ScheduleController')->except('destroy');
    Route::get('schedule/{id}/destroy', 'Web\Owner\ScheduleController@destroy')->name('schedule.destroy');
    Route::get('schedule/calendar/{id}', 'Web\Owner\ScheduleController@getcallendar')->name('schedule.callendar');
    Route::resource('t-profile', 'Web\Owner\ProfileController')->only(['index', 'create', 'store']);

    Route::get('user', 'Web\Owner\UserController@index')->name('owner.user.index');
    Route::get('user/{id}', 'Web\Owner\UserController@show')->name('owner.user.show');
    Route::get('user/{id}/confirmed', 'Web\Owner\UserController@confirmed')->name('owner.user.confirmed');
    Route::patch('user/{id}/choosedriver', 'Web\Owner\UserController@chooseDriver')->name('owner.user.choosedriver');
    Route::patch('user/{id}/decline', 'Web\Owner\UserController@decline')->name('owner.user.decline');
    Route::get('user/{id}/driver', 'Web\Owner\UserController@getDrivers');

    Route::get('report', 'Web\Owner\ReportController@index')->name('owner.report.index');
    Route::post('report/search', 'Web\Owner\ReportController@search')->name('owner.report.search');
    Route::get('report/{month}/print','Web\Owner\ReportController@print')->name('owner.report.print');

    Route::get('profile','Web\Owner\ProfileController@index')->name('owner.profile.index');
    Route::patch('profile/update','Web\Owner\ProfileController@update')->name('owner.profile.update');



});


Route::post('notification/handler', 'HomeController@notificationHandler');