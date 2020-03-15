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

Route::post('/register', 'Auth\RegisterController@register');
//Route::post('/register', 'Api\AuthController@register')->name('register');
//Route::post('/login', 'Api\AuthController@login')->name('login');
//Route::post('/logout', 'Api\AuthController@logout')->name('logout');
//Auth::routes(['verify' => true]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
