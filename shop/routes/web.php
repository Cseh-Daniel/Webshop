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

Route::get('/',"termekController@getIndex");

Route::get('/signup',"RegController@create");
Route::post('signup',"RegController@store");

Route::get('/signin',"UserController@create");
Route::post('signin',"UserController@store");
