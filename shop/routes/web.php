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
  Route::get('/register',"PagesController@getSignup")->name("register");
  Route::get('/login',"PagesController@getSignin")->name("login");
  Route::post('signup',"RegController@store");
  Route::post('login',"UserController@store");
});


  Route::get("/rendel","PagesController@Rendel");
  Route::post("rendel","OrderingController@Rendel")->name("prendel");

  Route::get('/mail',"PagesController@mail");


  Route::get('/',"PagesController@getIndex")->name("home");
  //Route::get("/kosarhozad/{id}","termekController@kosarhozad")->name("kosarhozad");
  Route::post("/kosarhozad","termekController@kosarhozad")->name("kosarhozad");
  Route::get("/kosar","termekController@kosarTartalom")->name("kosar");
  Route::post("/kosarupdate","termekController@kosarUpdate")->name("kosarupdate");

Route::middleware("auth")->group(function(){
  Route::get('/profil',"UserController@showProfile");
  Route::get('/logout',"UserController@destroy");
  Route::post('/addressupdate',"UserController@addressupdate");
  Route::post('/pwupdate',"UserController@pwupdate");


});

Route::middleware("isAdmin")->prefix("admin")->group(function(){
Route::post("/feltolt/submit","termekController@submit");
  Route::get("/feltoltes","PagesController@getFeltolt");
  //Route::get("/login","PagesController@getAlogin");
});

Auth::routes();
