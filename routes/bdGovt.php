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
        Route::get('profile/{id}', 'UserController@profile')->name('profile');
    });

    // route for manage center
    Route::group(['prefix' => 'manage-center/', 'as' => 'manageCenter.'], function () {
        Route::get('index', 'CenterController@index')->name('index');
        Route::get('profile/{id}', 'CenterController@profile')->name('profile');         
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
        'except' => ['create', 'store','destroy','update','edit'],
        'names' => [
            'index' => 'pcr.normal.index',
            'show' => 'pcr.normal.show',
            // 'edit' => 'pcr.normal.edit',
            // 'update' => 'pcr.normal.update',
            // 'destroy' => 'pcr.normal.destroy',
        ]
    ]);

    // route for premium pcr
    Route::resource('pcr-premium', 'PremiumPCRController', [
        'except' => ['create', 'store','destroy','update','edit'],
        'names' => [
            'index' => 'pcr.premium.index',
            'show' => 'pcr.premium.show',
            // 'edit' => 'pcr.premium.edit',
            // 'update' => 'pcr.premium.update',
            // 'destroy' => 'pcr.premium.destroy',
        ]
    ]);

    // route for registered vaccination
    Route::resource('vaccination-normal', 'NormalVaccinationController', [
        'except' => ['create', 'store','destroy','update','edit'],
        'names' => [
            'index' => 'vaccination.normal.index',
            'show' => 'vaccination.normal.show',
            // 'edit' => 'vaccination.normal.edit',
            // 'update' => 'vaccination.normal.update',
            // 'destroy' => 'vaccination.normal.destroy',
        ]
    ]);

    // route for premium vaccination
    Route::resource('vaccination-premium', 'PremiumVaccinationController', [
        'except' => ['create', 'store','destroy','update','edit'],
        'names' => [
            'index' => 'vaccination.premium.index',
            'show' => 'vaccination.premium.show',
            // 'edit' => 'vaccination.premium.edit',
            // 'update' => 'vaccination.premium.update',
            // 'destroy' => 'vaccination.premium.destroy',
        ]
    ]);

    // route for registered booster
    Route::resource('booster-normal', 'NormalBoosterController', [
        'except' => ['create', 'store','destroy','update','edit'],
        'names' => [
            'index' => 'booster.normal.index',
            'show' => 'booster.normal.show',
            // 'edit' => 'booster.normal.edit',
            // 'update' => 'booster.normal.update',
            // 'destroy' => 'booster.normal.destroy',
        ]
    ]);

    // route for premium booster
    Route::resource('booster-premium', 'PremiumBoosterController', [
        'except' => ['create', 'store','destroy','update','edit'],
        'names' => [
            'index' => 'booster.premium.index',
            'show' => 'booster.premium.show',
            // 'edit' => 'booster.premium.edit',
            // 'update' => 'booster.premium.update',
            // 'destroy' => 'booster.premium.destroy',
        ]
    ]);
});
