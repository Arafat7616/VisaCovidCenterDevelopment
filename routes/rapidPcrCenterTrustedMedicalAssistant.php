<?php

use Illuminate\Support\Facades\Route;

// RapidPCRCenterTrustedMedicalAssistant route
Route::group(['prefix' => 'rapid-pcr-center-trusted-medical-assistant/', 'namespace' => 'RapidPCRCenterTrustedMedicalAssistant', 'as' => 'rapidPcrCenterTrustedMedicalAssistant.', 'middleware' => ['auth', 'rapidPcrCenterTrustedMedicalAssistant']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');

    // route for premium user service
    Route::group(['prefix' => 'premium/', 'as' => 'premium.'], function () {
        Route::get('pcr', 'PremiumController@pcr')->name('pcr');
        Route::get('vaccine', 'PremiumController@vaccine')->name('vaccine');
        Route::get('booster', 'PremiumController@booster')->name('booster');
    });

    // route for user
    Route::group(['prefix' => 'user/', 'as' => 'user.'], function () {

        Route::get('pcr', 'UserController@pcr')->name('pcr');
        Route::get('vaccine', 'UserController@vaccine')->name('vaccine');
        Route::get('booster', 'UserController@booster')->name('booster');
    });

    // payment
    Route::group(['prefix' => 'payment/', 'as' => 'payment.'], function () {
        Route::get('take-from-user/{user_id}/{purpose}', 'PaymentController@takePaymentFromUser')->name('takePaymentFromUser');
    });
});
