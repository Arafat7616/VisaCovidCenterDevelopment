<?php

use Illuminate\Support\Facades\Route;

// Volunteer route
Route::group(['prefix' => 'volunteer/', 'namespace' => 'Volunteer', 'as' => 'volunteer.', 'middleware' => ['auth', 'volunteer']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // Route::get('dashboard', 'Regis@dashboard')->name('dashboard');

});
