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

Route::get('/', 'UsersController@index');

Route::get('/show', 'UsersController@profile')->middleware('auth');

Route::get('/login', 'UsersController@login');
Route::post('/profile', 'UsersController@postLogin');

Route::get('/logout', 'UsersController@logout');

//register user
Route::post('/register_user', 'RegisterController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
