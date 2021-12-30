<?php

use Illuminate\Support\Facades\Route;

// TrustedMedicalAssistant route
Route::group(['prefix' => 'trusted-medical-assistant/', 'namespace' => 'TrustedMedicalAssistant', 'as' => 'volunteer.', 'middleware' => ['auth', 'trustedMedicalAssistant']], function () {

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
