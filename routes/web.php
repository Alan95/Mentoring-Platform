<?php

use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
  return view('profile');
});

Route::get('/register', 'Auth\RegisterController@getForm');
Route::post('/profile', 'Auth\RegisterController@postForm');
=======
Route::get('/register', 'Auth\RegisterController@showRegisterPage');
Route::post('/register', 'Auth\RegisterController@store');


Route::get('/profile', 'ProfileController@showProfilePage');


>>>>>>> caf00ee88e84a917a4fecd2e02f7c1c275b938fe
