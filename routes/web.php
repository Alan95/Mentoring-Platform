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

Route::get('/register', 'UserController@showRegisterForm');
Route::post('/api/register', 'UserController@addNewUser');
Route::post('/api/update/user', 'UserController@updateUser');
Route::get('/api/users', 'UserController@getAllUser');

Route::post('/api/image', 'UserController@uploadImage');
Route::post('/api/password', 'UserController@changePassword');

Route::get('/login', 'UserController@showLoginForm');
Route::post('/api/login', 'UserController@doLogin');
Route::get('logout', 'UserController@loggingOut');

Route::get('/profile', 'ProfileController@showProfilePage')->name('profile');

Route::get('/api/user', 'UserController@getMyUser');
Route::get('/api/user/{type}', 'UserController@getUserType');

Route::post('uploadAvatar', 'UserController@uploadAvatar');

Route::resource('groups', 'GroupController');

Route::resource('conversations', 'ConversationController');

Route::get('/backend', 'UserController@showBackend')->name('backend');

Route::post('/api/message', 'MessageController@sendMessage');
Route::get('/api/message', 'MessageController@getMessages');

Route::get('/chat', 'ChatController@index');

Route::get('/chats', 'ChatController@fetchChats');
Route::post('/chats', 'ChatController@sendChat');