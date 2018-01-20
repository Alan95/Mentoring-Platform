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

Route::get('/register/{type?}', 'UserController@showRegisterForm');
Route::post('/api/register', 'UserController@addNewUser');
Route::post('/api/update/user', 'UserController@updateUser');
Route::get('/api/users', 'UserController@getAllUser');

Route::get('/login', 'UserController@showLoginForm');
Route::post('/api/login', 'UserController@doLogin');
Route::get('logout', 'UserController@loggingOut');

Route::get('/profile', 'ProfileController@showProfilePage')->name('profile');

Route::get('/api/user', 'UserController@getMyUser');

Route::post('uploadAvatar', 'UserController@uploadAvatar');

Route::get('/backend', 'UserController@showBackend')->name('backend');
