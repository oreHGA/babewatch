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

Route::get('/', function () {return view('welcome');});

Route::resource('/babe', 'BabeController');

Route::get('addfriend', function(){
    return view('addauthorizedcarriers');
});
Route::post('addfriend', 'AllowedUsersController@addFriend');

Route::post('authenticate', 'AuthenticationController@authenticate');
// TODO: Create view for a user to add his/her friends
// TODO: Open camera stream to validate users once they hit a button / have a streea open on another dedicated device