<?php

use Illuminate\Support\Facades\Route;

// Volunteer route
Route::group(['prefix' => 'volunteer/', 'namespace' => 'Volunteer', 'as' => 'volunteer.', 'middleware' => ['auth', 'volunteer']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

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
