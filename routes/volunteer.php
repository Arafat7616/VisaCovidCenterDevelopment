<?php

use Illuminate\Support\Facades\Route;

// Volunteer route
Route::group(['prefix' => 'volunteer/', 'namespace' => 'Volunteer', 'as' => 'volunteer.', 'middleware' => ['auth', 'volunteer']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::group(['prefix' => 'registered/', 'as' => 'registered.'], function () {
        Route::get('pcr', 'RegisteredController@pcr')->name('pcr');
        Route::get('vaccine', 'RegisteredController@vaccine')->name('vaccine');
        Route::get('booster', 'RegisteredController@booster')->name('booster');
    });
});
