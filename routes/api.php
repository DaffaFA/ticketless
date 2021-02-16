<?php

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

Route::middleware('auth:petugas,penumpang')->get('/user', 'API\AuthController@getUser');
Route::middleware('auth:petugas,penumpang')->get('/admin/user', 'API\AuthController@getAdmin');

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::post('/logout', 'API\AuthController@logout');

Route::prefix('/admin')->group(function () {
    Route::post('/login', 'API\AuthController@adminLogin');
});
