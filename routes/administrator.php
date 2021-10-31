<?php

use Illuminate\Support\Facades\Route;

// Administrator route
Route::group(['prefix' => 'administrator/', 'namespace' => 'Administrator', 'as' => 'administrator.', 'middleware' => ['auth', 'administrator']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // route for Volunteer
    Route::group(['prefix' => 'volunteer/', 'as' => 'volunteer.'], function () {
        Route::get('index', 'VolunteerController@index')->name('index');
    });

    // route for registered
    Route::group(['prefix' => 'registered/', 'as' => 'registered.'], function () {
        Route::get('pcr', 'RegisteredController@pcr')->name('pcr');
        Route::get('vaccine', 'RegisteredController@vaccine')->name('vaccine');
        Route::get('booster', 'RegisteredController@booster')->name('booster');
    });

    // regular man power
    Route::group(['prefix' => 'regular/', 'as' => 'regular.'], function () {
        Route::get('index', 'RegularManPowerController@index')->name('index');
        Route::post('store', 'RegularManPowerController@store')->name('store');
    });

    // regular man power
    Route::group(['prefix' => 'premium/', 'as' => 'premium.'], function () {
        Route::get('index', 'PremiumManPowerController@index')->name('index');
        Route::post('store', 'PremiumManPowerController@store')->name('store');

    });

    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::resource('trustedPeople', 'TrustedPeopleController');
    Route::post('trustedPeople/verification', 'TrustedPeopleController@verification');
    Route::get('verification/qr-scan', 'QrController@qrScan')->name('qrScan');
    Route::get('account/info', 'AccontInfoController@info')->name('info');
    Route::put('account/update', 'AccontInfoController@infoUpdate')->name('infoUpdate');


    Route::resource('price', 'PriceController');
});
