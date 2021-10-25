<?php

use Illuminate\Support\Facades\Route;

// Receptionist route
Route::group(['prefix' => 'receptionist/', 'namespace' => 'Receptionist', 'as' => 'receptionist.', 'middleware' => ['auth', 'receptionist']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    // new registration
    Route::get('new-registration', 'NewRegistrationController@index')->name('newRegistration.index');

    Route::resource('trustedPeople', 'TrustedPeopleController');
    Route::post('trustedPeople/verification', 'TrustedPeopleController@verification');
    Route::get('verification/qr-scan', 'QrController@qrScan')->name('qrScan');

    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user-filter/{searchKey}', 'UserController@filter')->name('newRegistration.filter');

    Route::get('account/info', 'AccontInfoController@info')->name('info');
    Route::put('account/update', 'AccontInfoController@infoUpdate')->name('infoUpdate');

    // users
    Route::get('user', 'UserController@index')->name('user.index');
    Route::get('user-get/{id}', 'UserController@getUserDetails')->name('user.getUserDetails');

    // printing
    Route::get('printing', 'PrintController@index')->name('printing.index');
    Route::get('user-pdf-generater/{id}', 'PrintController@generatePDF')->name('printing.generatePDF');
});
