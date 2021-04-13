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

Route::get('/', function () {
    return view('home');
});

Route::get('/mypage', 'CallController@call');

Route::post('/call', 'CallController@postCall');

Route::get('/register', 'LoginController@register');
Route::post('/register', 'LoginController@postRegister');

Route::get('/login', 'LoginController@login');
Route::post('/login', 'LoginController@postLogin');