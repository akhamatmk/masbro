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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('home', function () {
    return view('welcome');
})->name('home');


Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@check_login')->name('post-login');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@check_register')->name('post-register');

Route::get('logout', 'Auth\LogoutController@index')->name('logout');