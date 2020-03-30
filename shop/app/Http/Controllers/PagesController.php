<?php

namespace App\Http\Controllers;

use App\termekek;
use Illuminate\Http\Request;
use Auth;
use Session;

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

  public function rendel(){

    if(Auth::check()){
    $uid = Auth::user()->id;
  }else {
    $uid=Session::getId();
  }

    $kosartartalom=\Cart::session($uid)->getContent();
    $kosar=$kosartartalom->toArray();
    $osszeg=\Cart::session($uid)->getTotal();
    $ossze=\Cart::session($uid)->getSubTotal();
    $osszdb=\Cart::session($uid)->getTotalQuantity();

    return view("shop.rendel",["osszertek"=>$osszeg,"kosar"=>$kosar]);
  }

  /*public function getAlogin(){
    return view("admin.login");
  }*/

}
