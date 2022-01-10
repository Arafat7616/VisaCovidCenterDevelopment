<?php

use Illuminate\Support\Facades\Route;

// Pathologist route
Route::group(['prefix' => 'rapid-pcr-center-pathologist/', 'namespace' => 'RapidPCRCenterPathologist', 'as' => 'rapidPcrCenterPathologist.', 'middleware' => ['auth', 'rapidPcrCenterPathologist']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');

    // pcrResult
    Route::group(['prefix' => 'pcr-result/', 'as' => 'pcrResult.'], function () {
        Route::get('waiting', 'PcrResultController@waiting')->name('waiting');
        Route::get('published', 'PcrResultController@published')->name('published');
        Route::get('get-pcr-details/{id}', 'PcrResultController@getPcrDetails')->name('getPcrDetails');
        Route::post('update/{id}', 'PcrResultController@update')->name('update');
    });
});


