<?php

use Illuminate\Support\Facades\Route;

// Super Admin route
// Route::group(['prefix' => 'super-admin/', 'namespace' => 'SuperAdmin', 'as' => 'superAdmin.'], function () {
Route::group(['prefix' => 'super-admin/', 'namespace' => 'SuperAdmin', 'as' => 'superAdmin.', 'middleware' => ['auth', 'superAdmin']], function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    Route::resource('payment', 'PaymentMethodController');
    Route::resource('slider', 'SliderController');

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
        Route::get('edit/{id}', 'UserController@edit')->name('edit');
        Route::post('update/{id}', 'UserController@update')->name('update');
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
            Route::get('banner', 'LandingPageController@banner')->name('banner');
            Route::post('banner-update', 'LandingPageController@bannerUpdate')->name('bannerUpdate');
            Route::get('download', 'LandingPageController@download')->name('download');
            Route::post('download-update', 'LandingPageController@downloadUpdate')->name('downloadUpdate');
            Route::get('banner', 'LandingPageController@banner')->name('banner');
            Route::resource('service', 'LandingPageServiceController', [
                'except' => ['show']
            ]);
            Route::resource('work', 'LandingPageWorkController', [
                'except' => ['show']
            ]);
            Route::get('testimonial', 'LandingPageController@testimonial')->name('testimonial');
            Route::post('testimonial-update', 'LandingPageController@testimonialUpdate')->name('testimonialUpdate');
            Route::get('footer', 'LandingPageController@footer')->name('footer');
            Route::post('footer-update', 'LandingPageController@footerUpdate')->name('footerUpdate');
            // Route::resource('subscriber', SubscriberController::class);
            Route::resource('subscriber', 'SubscriberController', [
                'except' => ['create', 'show', 'edit', 'update', 'store']
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
     Route::resource('vaccination-normal', 'NormalPCRController', [
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
    Route::resource('vaccination-premium', 'PremiumPCRController', [
        'except' => ['create', 'store'],
        'names' => [
            'index' => 'vaccination.premium.index',
            'show' => 'vaccination.premium.show',
            'edit' => 'vaccination.premium.edit',
            'update' => 'vaccination.premium.update',
            'destroy' => 'vaccination.premium.destroy',
        ]
    ]);
});
