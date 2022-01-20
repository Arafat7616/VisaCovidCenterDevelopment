<?php

use Illuminate\Support\Facades\Route;

// RapidPCRCenterAdministrator route
Route::group(['prefix' => 'rapid-pcr-center-administrator/', 'namespace' => 'RapidPCRCenterAdministrator', 'as' => 'rapidPcrCenterAdministrator.', 'middleware' => ['auth', 'rapidPcrCenterAdministrator']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('center-modify', 'DashboardController@centerModify')->name('centerModify');
    Route::post('center-modify-post', 'DashboardController@centerModifyPost')->name('centerModifyPost');

    // route for TrustedMedicalAssistant
    Route::group(['prefix' => 'trusted-medical-assistant/', 'as' => 'trustedMedicalAssistant.'], function () {
        Route::get('index', 'TrustedMedicalAssistantController@index')->name('index');
    });

    // route for registered
    Route::group(['prefix' => 'registered/', 'as' => 'registered.'], function () {
        Route::get('pcr', 'RegisteredController@pcr')->name('pcr');
        Route::post('pcr-swap', 'RegisteredController@pcrSwap')->name('pcr.swap');
    });

    // route for premium registered
    Route::group(['prefix' => 'premium-registered/', 'as' => 'premiumRegistered.'], function () {
        Route::get('pcr', 'PremiumRegisteredController@pcr')->name('pcr');
        Route::post('pcr-swap', 'PremiumRegisteredController@pcrSwap')->name('pcr.swap');
    });

    // regular man power
    Route::group(['prefix' => 'regular/', 'as' => 'regular.'], function () {
        Route::get('index', 'RegularManPowerController@index')->name('index');
        Route::get('create', 'RegularManPowerController@create')->name('create');
        Route::get('edit/{id}', 'RegularManPowerController@edit')->name('edit');
        Route::post('update/{id}', 'RegularManPowerController@update')->name('update');
        Route::post('store', 'RegularManPowerController@store')->name('store');
        Route::delete('destroy/{id}', 'RegularManPowerController@destroy')->name('destroy');
    });

    // regular man power
    Route::group(['prefix' => 'premium/', 'as' => 'premium.'], function () {
        Route::get('index', 'PremiumManPowerController@index')->name('index');
        Route::get('create', 'PremiumManPowerController@create')->name('create');
        Route::get('edit/{id}', 'PremiumManPowerController@edit')->name('edit');
        Route::post('update/{id}', 'PremiumManPowerController@update')->name('update');
        Route::post('store', 'PremiumManPowerController@store')->name('store');
        Route::delete('destroy/{id}', 'PremiumManPowerController@destroy')->name('destroy');
    });

    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::resource('trustedPeople', 'TrustedPeopleController');
    Route::resource('centerVaccine', 'CenterVaccineNameController');
    Route::post('trustedPeople/verification', 'TrustedPeopleController@verification');
    Route::post('trustedPeople/resend-otp', 'TrustedPeopleController@resendOtp');
    Route::get('verification/qr-scan', 'QrController@qrScan')->name('qrScan');
    Route::get('account/info', 'AccontInfoController@info')->name('info');
    Route::put('account/update', 'AccontInfoController@infoUpdate')->name('infoUpdate');

    Route::resource('price', 'PriceController');
});
