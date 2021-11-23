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
        Route::post('pcr-swap', 'RegisteredController@pcrSwap')->name('pcr.swap');
        Route::get('vaccine-dose-1', 'RegisteredController@vaccineDose1')->name('vaccine.dose1');
        Route::post('vaccine-swap-dose-1', 'RegisteredController@vaccineSwapDose1')->name('vaccine.swapDose1');
        Route::get('vaccine-dose-2', 'RegisteredController@vaccineDose2')->name('vaccine.dose2');
        Route::post('vaccine-swap-dose-2', 'RegisteredController@vaccineSwapDose2')->name('vaccine.swapDose2');
        Route::get('booster', 'RegisteredController@booster')->name('booster');
        Route::post('booster-swap', 'RegisteredController@boosterSwap')->name('booster.swap');
    });

     // route for premium registered
     Route::group(['prefix' => 'premium-registered/', 'as' => 'premiumRegistered.'], function () {
        Route::get('pcr', 'PremiumRegisteredController@pcr')->name('pcr');
        Route::post('pcr-swap', 'PremiumRegisteredController@pcrSwap')->name('pcr.swap');
        Route::get('vaccine-dose-1', 'PremiumRegisteredController@vaccineDose1')->name('vaccine.dose1');
        Route::post('vaccine-swap-dose-1', 'PremiumRegisteredController@vaccineSwapDose1')->name('vaccine.swapDose1');
        Route::get('vaccine-dose-2', 'PremiumRegisteredController@vaccineDose2')->name('vaccine.dose2');
        Route::post('vaccine-swap-dose-2', 'PremiumRegisteredController@vaccineSwapDose2')->name('vaccine.swapDose2');
        Route::get('booster', 'PremiumRegisteredController@booster')->name('booster');
        Route::post('booster-swap', 'PremiumRegisteredController@boosterSwap')->name('booster.swap');
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
    Route::post('trustedPeople/resend-otp', 'TrustedPeopleController@resendOtp');
    Route::get('verification/qr-scan', 'QrController@qrScan')->name('qrScan');
    Route::get('account/info', 'AccontInfoController@info')->name('info');
    Route::put('account/update', 'AccontInfoController@infoUpdate')->name('infoUpdate');

    Route::resource('price', 'PriceController');
});
