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


Route::middleware("guest")->group(function(){
  Route::get('/',"PagesController@getIndex");
  Route::get('/signup',"PagesController@getSignup");
  Route::get('/login',"PagesController@getSignin")->name("login");
});

Route::middleware("auth")->group(function(){
  Route::get('/profil',"UserController@showProfile");
  Route::get('/logout',"UserController@destroy");
  Route::get("/feltoltes","PagesController@getFeltolt");
  Route::post("/feltolt/submit","termekController@submit");
});

Route::post('signup',"RegController@store");
Route::post('login',"UserController@store");
