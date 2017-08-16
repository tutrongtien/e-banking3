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


Route::group(['middleware' => ['web']], function(){
	Route::get('/', 'UsersController@index');
	Route::get('/login', 'UsersController@login');
	Route::post('/profile', 'UsersController@postLogin');
	//register user
	Route::post('/register_user', 'RegisterController@store');
	Route::get('/user/active/{confirmcode}', 'RegisterController@confirm');
});

// Route::group([ 'middleware' => ['auth']], function(){
	//
Route::group(['middleware' => ['auth']], function(){
	Route::get('/show', 'UsersController@profile');	
	Route::get('password/change', 'UsersController@changePassword');
	Route::put('password/change', 'UsersController@updatePassword');

	Route::get('view/balance', 'UsersController@viewBalance');
    Route::get('ajax/balance/{id}', 'UsersController@ajaxBalance');

    Route::get('view/transactions', 'UsersController@viewTransactions');
	Route::get('/transactions/detail', 'UsersController@detailTransactions');

	Route::get('/logout', 'UsersController@logout');
	Route::get('balance/pdf', 'UsersController@balancePDF');
	Route::get('transactions/pdf', 'UsersController@transactionsPDF');

	//transfer
	Route::get('/internal_transfer', 'TransferController@internal_transfer');
	Route::get('/external_transfer', 'TransferController@external_transfer');

	Route::group(['middleware' => ['admin']], function(){
		Route::get('admin/delete/{user}', 'AdminController@delete');
		Route::get('admin/create', 'AdminController@create');
		Route::post('admin/store', 'AdminController@store');
		Route::get('admin/edit/{user}', 'AdminController@edit');
		Route::put('admin/update/{user}', 'AdminController@update');
		Route::get('admin/show/{user}', 'AdminController@show');
		Route::get('admin/index', 'AdminController@index');
		Route::get('admin/lock/{user}', 'AdminController@lockAndUnlockUser');
	});
});
	
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');























