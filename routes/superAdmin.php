<?php

use Illuminate\Support\Facades\Route;

// Super Admin route
Route::group(['prefix' => 'super-admin/', 'namespace' => 'SuperAdmin', 'as' => 'superAdmin.', 'middleware' => ['auth', 'superAdmin']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::resource('payment', 'PaymentMethodController');
    Route::resource('slider', 'SliderController');

    // route for manage user
    Route::group(['prefix' => 'manage-user/', 'as' => 'manageUser.'], function () {
        Route::get('administrator', 'UserController@administrator')->name('administrator');
      
    });
});
