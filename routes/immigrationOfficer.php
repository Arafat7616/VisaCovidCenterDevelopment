<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ImmigrationOfficer route
Route::group(['prefix' => 'immigration-officer/', 'namespace' => 'ImmigrationOfficer', 'as' => 'immigrationOfficer.', 'middleware' => ['auth', 'immigrationOfficer']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');

    Route::group(['prefix' => 'latest-user/', 'as' => 'latestUser.'], function () {
        Route::get('show', 'LatestUserController@show')->name('show');
    });

    Route::group(['prefix' => 'immigration-passed-list/', 'as' => 'immigrationPassedList.'], function () {
        Route::get('index', 'ImmigrationPassedListController@index')->name('index');
    });
});
