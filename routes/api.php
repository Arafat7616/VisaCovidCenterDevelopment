<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


// Route::get('/hello', function (){
//     $users = User::all();

//     return response()->json([
//         'type' => 'success',
//         'users' => $users,
//     ]);
// });

Route::post('user/create', 'Api\UserController@store');
Route::post('user/login', 'Api\UserController@login');
Route::post('user/otpCheck', 'Api\UserController@otpCheck');


//Home route
Route::get('home/slider', 'Api\HomeController@slider');

//Service registration route
Route::get('home/country', 'Api\HomeController@country');
Route::get('home/state/{id}', 'Api\HomeController@state');
Route::get('home/city/{id}', 'Api\HomeController@city');
Route::get('home/center/{id}', 'Api\HomeController@center');

Route::post('home/vaccine/registration', 'Api\ServiceRegistrationController@vaccineRegistration');
Route::post('home/vaccine/externalVaccination', 'Api\ServiceRegistrationController@externalVaccination');
Route::post('home/vaccine/externalVaccinationDoseTwo', 'Api\ServiceRegistrationController@externalVaccinationDoseTwo');
Route::post('test-image-store', 'Api\ServiceRegistrationController@testImageStore');
Route::post('updateProfilePicture', 'Api\ServiceRegistrationController@updateProfilePicture');


Route::post('home/prc/registration', 'Api\ServiceRegistrationController@prcRegistration');
Route::post('home/booster/registration', 'Api\ServiceRegistrationController@boosterRegistration');

Route::post('home/vaccine/vaccinationCenterSelect', 'Api\ServiceRegistrationController@vaccinationCenterSelect');
Route::get('home/vaccine/vaccineName', 'Api\ServiceRegistrationController@vaccineName');


//Service Status Check
Route::post('home/vaccine/statusCheck', 'Api\HomeController@VaccineStatusCheck');
Route::post('home/pcr/statusCheck', 'Api\HomeController@PrcStatusCheck');
Route::post('home/booster/statusCheck', 'Api\HomeController@BoosterStatusCheck');


//Service time status check
Route::post('home/vaccination/leftTime', 'Api\HomeController@vaccinationLeftTime');
Route::post('home/pcr/leftTime', 'Api\HomeController@pcrLeftTime');
Route::post('home/booster/leftTime', 'Api\HomeController@boosterLeftTime');

// Profile
Route::post('home/profile', 'Api\HomeController@userProfile');
Route::post('home/editProfile', 'Api\HomeController@editProfile');
Route::post('home/updateProfile', 'Api\HomeController@updateProfile');

Route::post('home/profileInformation', 'Api\HomeController@profileInformation');


// Information
Route::post('home/vaccinationInformation', 'Api\HomeController@vaccinationInformation');
Route::post('home/pcrInformation', 'Api\HomeController@pcrInformation');
Route::post('home/boosterInformation', 'Api\HomeController@boosterInformation');

// Synchronize info
Route::get('home/synchronizeInformation/{country_id}', 'Api\HomeController@synchronizeInformation');

Route::post('otpResend', 'Api\UserController@otpResend');


Route::post('uploadImage', 'Api\UserController@uploadImage');


Route::post('volunteer/login', 'Api\CenterController@login');
Route::post('volunteer/otp', 'Api\CenterController@volunteerOtp');
Route::post('volunteer/otpResend', 'Api\CenterController@otpResend');


//center otp process
Route::post('centerOptSend', 'Api\PcrCenterController@centerOptSend');
Route::post('centerOptCheck', 'Api\PcrCenterController@centerOptCheck');

//pcr center
Route::post('pcr/registeredList', 'Api\PcrCenterController@registeredList');
Route::post('pcr/pcrUserOtp', 'Api\PcrCenterController@pcrUserOtp');
Route::post('pcr/pcrVolunteerOtp', 'Api\PcrCenterController@pcrVolunteerOtp');
Route::post('pcr/pcrFrom', 'Api\PcrCenterController@pcrFrom');

//booster center
Route::post('booster/registeredList', 'Api\BoosterCenterController@registeredList');
Route::post('booster/boosterUserOtp', 'Api\BoosterCenterController@boosterUserOtp');
Route::post('booster/boosterVolunteerOtp', 'Api\BoosterCenterController@boosterVolunteerOtp');
Route::post('booster/boosterFrom', 'Api\BoosterCenterController@boosterFrom');


//vaccine center
Route::post('vaccination/registeredFirstList', 'Api\VaccineCenterController@registeredFirstList');
Route::post('vaccination/registeredSecondList', 'Api\VaccineCenterController@registeredSecondList');
Route::post('vaccination/vaccinationUserOtp', 'Api\VaccineCenterController@vaccinationUserOtp');
Route::post('vaccination/vaccinationVolunteerOtp', 'Api\VaccineCenterController@vaccinationVolunteerOtp');
Route::post('vaccination/vaccinationFrom', 'Api\VaccineCenterController@vaccinationFrom');


//rtpcr
Route::post('rtpcrStatus', 'Api\RtpcrController@rtpcrStatus');
Route::get('rtpcrCenter/{id}', 'Api\RtpcrController@rtpcrCenter');
Route::post('rtpcrRegistration', 'Api\RtpcrController@rtpcrRegistration');
Route::post('rtpcrResult', 'Api\RtpcrController@rtpcrResult');
Route::post('rtpcrTimeLeft', 'Api\RtpcrController@rtpcrTimeLeft');

