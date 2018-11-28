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

Route::get('/', 'HomeController@index')->name('home');

Route::get('home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@check_login')->name('post-login');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@check_register')->name('post-register');

Route::get('logout', 'Auth\LogoutController@index')->name('logout');

Route::get('profile/user', 'Auth\UserController@profile')->name('profile')->middleware('auth');
Route::get('profile/user/edit', 'Auth\UserController@profile_edit')->name('edit-profile')->middleware('auth');
Route::post('profile/user/edit', 'Auth\UserController@save_edit')->name('save-edit-profile')->middleware('auth');

Route::get('user/new/password', 'Auth\UserController@set_new_password')->name('set-user-password')->middleware('auth');
Route::post('user/new/password', 'Auth\UserController@save_new_password')->middleware('auth');

Route::get('place/regencyAjax/{province_id}', 'PlaceController@regencyAjax')->name('place-regency-ajax');
Route::get('place/districtAjax/{regency_id}', 'PlaceController@districtAjax')->name('place-district-ajax');

Route::get('education/create', 'Auth\EducationController@create')->name('education-create')->middleware('auth');
Route::post('education/create', 'Auth\EducationController@store')->name('education-save')->middleware('auth');

Route::get('job/create', 'Auth\JobController@create')->name('job-create')->middleware('auth');
Route::post('job/create', 'Auth\JobController@store')->name('job-store')->middleware('auth');

Route::get('job/all', 'Auth\JobController@list_job_all')->name('list-job-all');
Route::get('job/detail/{id}', 'Auth\JobController@detail_job')->name('detail-job');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');