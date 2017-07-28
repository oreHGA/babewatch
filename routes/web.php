<?php

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

// landing route for the mandem
Route::get('/', function () {return view('welcome');})->name('welcome');
Route::resource('/babe', 'BabeController');
Route::post('authenticate', 'AuthenticationController@authenticate');
// TODO: Open camera stream to validate users once they hit a button / have a streea open on another dedicated device
Route::group(['middleware' => 'isloggedin'], function () {
    Route::get('addfriend', function(){ return view('addauthorizedcarriers');});
    Route::post('addfriend', 'AllowedUsersController@addFriend');
    Route::get('dashboard', function(){ return view('dashboard');})->name('dashboard');
    Route::get('signout', 'AuthenticationController@signout');
    Route::get('contact', function(){return view('contact');});
});