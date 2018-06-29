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

Route::group(['middleware' => ['check.auth']], function () {

	// Show one User
	Route::post('/user/get','UserController@getOneUser');

	// Add one User
	Route::post('/user/insert', 'UserController@insertOne');

	// Delete one User
	Route::delete('/user', 'UserController@deleteOne');
	//Route::post('user/delete', 'UserController@deleteOne');

	//Update On User
	Route::post('user/update/{id}','UserController@updateOne');




	Route::post('/roles/insert', 'RoleController@insertOne');

	Route::delete('/roles', 'RoleController@deleteOne');

	Route::post('roles/update/{id}','RoleController@updateOne');

	Route::get('/roles', 'RoleController@getAllUsers');



	//Show all Users
	Route::get('/', 'UserController@getAllUsers');

});

Route::post('/login', 'LoginController@login');
Route::post('/logout', 'LoginController@logout');
