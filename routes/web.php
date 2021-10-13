<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\Include_;

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
include('administrator.php');
include('receptionist.php');
include('volunteer.php');
include('pathologist.php');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/center', 'Auth\CenterRegistrationController@centerRegistrationDataStore')->name('centerRegistrationDataStore');
