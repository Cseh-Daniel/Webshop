<?php

namespace App\Http\Controllers;

use App\termekek;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
  public function getIndex(){
$termekek=termekek::all();
    return view("shop.home",["termekek" => $termekek]);
  }

  /*public function mail(){

    //Mail::to("codaryf@gmail.com")->send(new hello);

    return new OrderMail(1,2,3,4);

  }*/

  public function getSignup(){

    return view("auth.register");

  }

  public function getSignin(){

    return view("auth.login");

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
