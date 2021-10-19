<?php

use Illuminate\Support\Facades\Route;

// Administrator route
Route::group(['prefix' => 'administrator/', 'namespace' => 'Administrator', 'as' => 'administrator.', 'middleware' => ['auth', 'administrator']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resource('trustedPeople', 'TrustedPeopleController');
    Route::post('trustedPeople/verification', 'TrustedPeopleController@verification');
});
