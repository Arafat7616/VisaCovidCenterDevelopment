<?php

use Illuminate\Support\Facades\Route;

// Receptionist route
Route::group(['prefix' => 'receptionist/', 'namespace' => 'Receptionist', 'as' => 'receptionist.', 'middleware' => ['auth', 'receptionist']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

});
