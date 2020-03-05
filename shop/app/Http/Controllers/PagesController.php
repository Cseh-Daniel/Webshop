<?php

namespace App\Http\Controllers;

use App\termekek;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function getIndex(){
$termekek=termekek::all();

    return view("home",["termekek" => $termekek]);
  }

  public function getSignup(){

    return view("user.signup");

  }

  public function getSignin(){

    return view("user.signin");

  }

  public function getFeltolt(){
    return view("admin.feltolt");
  }

  /*public function getAlogin(){
    return view("admin.login");
  }*/

}
