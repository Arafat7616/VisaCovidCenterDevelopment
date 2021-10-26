<?php

use Illuminate\Support\Facades\Route;

// Administrator route
Route::group(['prefix' => 'administrator/', 'namespace' => 'Administrator', 'as' => 'administrator.', 'middleware' => ['auth', 'administrator']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // route for Volunteer
    Route::group(['prefix' => 'volunteer/', 'as' => 'volunteer.'], function () {
        Route::get('index', 'VolunteerController@index')->name('index');
    });

    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::resource('trustedPeople', 'TrustedPeopleController');
    Route::post('trustedPeople/verification', 'TrustedPeopleController@verification');
    Route::get('verification/qr-scan', 'QrController@qrScan')->name('qrScan');
    Route::get('account/info', 'AccontInfoController@info')->name('info');
    Route::put('account/update', 'AccontInfoController@infoUpdate')->name('infoUpdate');

    


    Route::resource('price', 'PriceController');
});
