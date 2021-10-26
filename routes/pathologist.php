<?php

use Illuminate\Support\Facades\Route;

// Pathologist route
Route::group(['prefix' => 'pathologist/', 'namespace' => 'Pathologist', 'as' => 'pathologist.', 'middleware' => ['auth', 'pathologist']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    // pcrResult
    Route::group(['prefix' => 'pcr-result/', 'as' => 'pcrResult.'], function () {
        Route::get('waiting', 'PcrResultController@waiting')->name('waiting');
        Route::get('published', 'PcrResultController@published')->name('published');
        Route::get('get-pcr-details/{id}', 'PcrResultController@getPcrDetails')->name('getPcrDetails');
        Route::post('update/{id}', 'PcrResultController@update')->name('update');
    });
});


