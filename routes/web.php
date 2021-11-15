<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AuthController@index')->name('login');

Route::get('/logout', 'AuthController@logout')->name('logout');

Route::post('/login', 'AuthController@login')->name('loginAction');

Route::get('/home', 'AuthController@home')->name('home');