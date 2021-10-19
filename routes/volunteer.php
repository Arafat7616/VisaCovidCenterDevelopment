<?php

use Illuminate\Support\Facades\Route;

// Volunteer route
Route::group(['prefix' => 'volunteer/', 'namespace' => 'Volunteer', 'as' => 'volunteer.', 'middleware' => ['auth', 'volunteer']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // route for registered user service
    Route::group(['prefix' => 'registered/', 'as' => 'registered.'], function () {
        Route::get('pcr', 'RegisteredController@pcr')->name('pcr');
        Route::get('vaccine', 'RegisteredController@vaccine')->name('vaccine');
        Route::get('booster', 'RegisteredController@booster')->name('booster');
    });
    // route for premium user service
    Route::group(['prefix' => 'premium/', 'as' => 'premium.'], function () {
        Route::get('pcr', 'PremiumController@pcr')->name('pcr');
        Route::get('vaccine', 'PremiumController@vaccine')->name('vaccine');
        Route::get('booster', 'PremiumController@booster')->name('booster');
    });
    // route for user
    Route::group(['prefix' => 'user/', 'as' => 'user.'], function () {
        Route::get('index', 'UserController@index')->name('index');

    });
});
