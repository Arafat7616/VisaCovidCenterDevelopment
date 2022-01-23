<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

include('superAdmin.php');
include('bdGovt.php');
include('administrator.php');
include('receptionist.php');
include('trustedMedicalAssistant.php');
include('pathologist.php');
include('immigrationOfficer.php');
include('rapidPcrCenterAdministrator.php');
include('rapidPcrCenterPathologist.php');
include('rapidPcrCenterReceptionist.php');
include('rapidPcrCenterTrustedMedicalAssistant.php');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'LandingPageController@index')->name('frontend.index');
Route::post('/subscribe/store', 'LandingPageController@subscribeStore')->name('frontend.subscribeStore');

// Auth::routes();
Auth::routes(['register' => false]);

//log in route
Route::get('immigration-officer-login', 'Auth\CustomLoginController@immigrationOfficerLogin')->name('auth.immigrationOfficerLogin');
Route::get('bd-govt-login', 'Auth\CustomLoginController@bdGovtLogin')->name('auth.bdGovtLogin');
Route::get('super-admin', 'Auth\CustomLoginController@superAdminLogin')->name('auth.superAdminLogin');
Route::post('login/getOtp', 'Auth\CustomLoginController@getMyOTP');
Route::post('login/checkOtp', 'Auth\CustomLoginController@checkOtp');

// Route for center registration


Route::get('/center-register', 'Auth\CenterRegistrationController@centerRegister')->name('centerRegister');
Route::post('/center-register-data-store', 'Auth\CenterRegistrationController@centerRegisterDataStore')->name('centerRegisterDataStore');
Route::post('/center-register-otp-verify', 'Auth\CenterRegistrationController@centerRegisterOptVerify')->name('centerRegisterOptVerify');

// Route for rapid center registration
Route::get('/rapid-pcr-center-register', 'Auth\RapidPCRCenterRegistrationController@centerRegister')->name('rapidPcr.centerRegister');
Route::post('/rapid-pcr-center-register-data-store', 'Auth\RapidPCRCenterRegistrationController@centerRegisterDataStore')->name('rapidPcr.centerRegisterDataStore');

Route::get('/share/user/{id}', 'ShareController@shareUser')->name('share.user');
Route::post('change-password', 'HomeController@changePassword')->name('changePassword');

// country -state - city - airport list related api
Route::get('/api/get-state-list/{country_id}', 'Auth\CenterRegistrationController@getStateList');
Route::get('/api/get-airport-list/{country_id}', 'Auth\CenterRegistrationController@getAirportList');
Route::get('/api/get-city-list/{state_id}', 'Auth\CenterRegistrationController@getCityList');
