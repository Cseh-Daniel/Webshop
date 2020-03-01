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

Route::get('/',"PagesController@getIndex");

Route::get('/signup',"PagesController@getSignup");
Route::post('signup',"RegController@store");

Route::get('/login',"PagesController@getSignin");
Route::post('login',"UserController@store");

Route::get('/profil',"UserController@showProfile");
Route::get('/logout',"UserController@destroy");

Route::post("/feltolt/submit","termekController@submit");
Route::get("/feltoltes","PagesController@getFeltolt");
