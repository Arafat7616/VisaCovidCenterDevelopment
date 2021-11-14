<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ImmigrationOfficer route
Route::group(['prefix' => 'immigration-officer/', 'namespace' => 'ImmigrationOfficer', 'as' => 'immigrationOfficer.', 'middleware' => ['auth', 'immigrationOfficer']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // Route::get('profile', 'DashboardController@profile')->name('profile');
});
