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
        Route::post('active/{id}', 'UserController@activeNow')->name('activeNow');
        Route::post('deactive/{id}', 'UserController@deactiveNow')->name('deactiveNow');
        Route::post('delete/{id}', 'UserController@deleteNow')->name('deleteNow');
        Route::post('profile/{id}', 'UserController@profile')->name('profile');
    });
});
