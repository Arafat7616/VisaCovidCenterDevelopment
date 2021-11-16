<?php

use Illuminate\Support\Facades\Route;

// Bd Govt route
Route::group(['prefix' => 'bd-govt/', 'namespace' => 'BdGovt', 'as' => 'bdGovt.', 'middleware' => ['auth', 'bdGovt']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');
    // route for manage user
    Route::group(['prefix' => 'manage-user/', 'as' => 'manageUser.'], function () {
        Route::get('administrator', 'UserController@administrator')->name('administrator');
        Route::get('volunteer', 'UserController@volunteer')->name('volunteer');
        Route::get('receptionist', 'UserController@receptionist')->name('receptionist');
        Route::get('pathologist', 'UserController@pathologist')->name('pathologist');
        Route::get('user', 'UserController@user')->name('user');
        Route::post('active/{id}', 'UserController@activeNow')->name('activeNow');
        Route::post('inactive/{id}', 'UserController@inactiveNow')->name('inactiveNow');
        Route::post('delete/{id}', 'UserController@deleteNow')->name('deleteNow');
        Route::get('profile/{id}', 'UserController@profile')->name('profile');
        // Route::get('edit/{id}', 'UserController@edit')->name('edit');
        // Route::post('update/{id}', 'UserController@update')->name('update');
    });

    // route for manage center
    Route::group(['prefix' => 'manage-center/', 'as' => 'manageCenter.'], function () {
        Route::get('index', 'CenterController@index')->name('index');
        Route::post('active/{id}', 'CenterController@activeNow')->name('activeNow');
        Route::post('inactive/{id}', 'CenterController@inactiveNow')->name('inactiveNow');
        Route::post('delete/{id}', 'CenterController@deleteNow')->name('deleteNow');
        Route::get('profile/{id}', 'CenterController@profile')->name('profile');
        Route::get('edit/{id}', 'CenterController@edit')->name('edit');
        Route::post('update/{id}', 'CenterController@update')->name('update');
    });

    // route for setting
    Route::group(['prefix' => 'setting/', 'as' => 'setting.'], function () {
        // route for landing-page
        Route::group(['prefix' => 'landing-page/', 'as' => 'landingPage.'], function () {
            Route::resource('subscriber', 'SubscriberController', [
                'except' => ['create', 'show', 'edit', 'update', 'store','destroy']
            ]);
        });
    });
    // route for registered pcr
    Route::resource('pcr-normal', 'NormalPCRController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'pcr.normal.index',
            'show' => 'pcr.normal.show',
            'edit' => 'pcr.normal.edit',
            'update' => 'pcr.normal.update',
            'destroy' => 'pcr.normal.destroy',
        ]
    ]);

    // route for premium pcr
    Route::resource('pcr-premium', 'PremiumPCRController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'pcr.premium.index',
            'show' => 'pcr.premium.show',
            'edit' => 'pcr.premium.edit',
            'update' => 'pcr.premium.update',
            'destroy' => 'pcr.premium.destroy',
        ]
    ]);

    // route for registered vaccination
    Route::resource('vaccination-normal', 'NormalVaccinationController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'vaccination.normal.index',
            'show' => 'vaccination.normal.show',
            'edit' => 'vaccination.normal.edit',
            'update' => 'vaccination.normal.update',
            'destroy' => 'vaccination.normal.destroy',
        ]
    ]);

    // route for premium vaccination
    Route::resource('vaccination-premium', 'PremiumVaccinationController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'vaccination.premium.index',
            'show' => 'vaccination.premium.show',
            'edit' => 'vaccination.premium.edit',
            'update' => 'vaccination.premium.update',
            'destroy' => 'vaccination.premium.destroy',
        ]
    ]);

    // route for registered booster
    Route::resource('booster-normal', 'NormalBoosterController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'booster.normal.index',
            'show' => 'booster.normal.show',
            'edit' => 'booster.normal.edit',
            'update' => 'booster.normal.update',
            'destroy' => 'booster.normal.destroy',
        ]
    ]);

    // route for premium booster
    Route::resource('booster-premium', 'PremiumBoosterController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'booster.premium.index',
            'show' => 'booster.premium.show',
            'edit' => 'booster.premium.edit',
            'update' => 'booster.premium.update',
            'destroy' => 'booster.premium.destroy',
        ]
    ]);
});
