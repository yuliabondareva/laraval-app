<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::post('/register', 'Api\AuthController@register')->name('register');
Route::post('/login', 'Api\AuthController@login')->name('login');
Route::post('/logout', 'Api\AuthController@logout')->name('logout');
Route::post('/getusers', 'Api\UsersController@getUsers')->name('getusers');
Route::post('/writemessage', 'Api\UsersController@writeMessage')->name('writemessage');
Route::post('/getmessagesfromuser', 'Api\UsersController@getMessagesFromUser')->name('getmessagesfromuser');
