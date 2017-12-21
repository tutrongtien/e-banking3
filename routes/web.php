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
    return view('layouts.master');
});
Route::get('/login', 'UsersController@login');
Route::post('form/login', 'UsersController@store');


//register user
Route::post('/register_user', 'RegisterController@store');
Route::get('/user/active/{confirmcode}', 'RegisterController@confirm');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
