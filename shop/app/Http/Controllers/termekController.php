<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\termekek;
use App\kosar;
use Auth;
use Session;

class termekController extends Controller
{


public function submit(Request $request){
$this->validate($request,[
  "csop"=>"required",
  "nev"=>"required",
  "db"=>"required",
  "ar"=>"required"
]);

$termekek=new termekek;
$termekek->csop=$request->input("csop");
$termekek->nev=$request->input("nev");
$termekek->db=$request->input("db");
$termekek->ar=$request->input("ar");

$termekek->save();
return redirect("/")->with("siker","A terméket sikeresen feltöltötte!");
}

public function kosarhozad(Request $request){

  if(Auth::check()){
  $uid = Auth::user()->id;
}else {
  $uid=Session::getId();
}

  $tid=$request["id"];
  $tdb=$request["db"];


  $termek=termekek::find($tid);
$termek["nev"];
  \Cart::session($uid)->add($tid,$termek["nev"],$termek["ar"],$tdb,array());
  //dd($request,$tid,$tdb,$uid,$termek["nev"],$termek["ar"]);
  //dd($db);

/*
  $termekek=termekek::find($id);
  $regikosar=Session::has("kosar") ? Session::get("kosar") : null;
  $kosar=new kosar($regikosar);
  $kosar->add($termekek,$termekek->id);

  $request->session()->put("kosar",$kosar);
  dd($request->session()->get("kosar"));
*/
return redirect()->route("home");

}

public function kosarTartalom(){

  if(Auth::check()){
  $uid = Auth::user()->id;
}else {
  $uid=Session::getId();
}

  $kosartartalom="";
  /*if(!Session::has("kosar")){
    return view("shop.kosar");
  }
  $regikosar=Session::get("kosar");
  $kosar=new kosar($regikosar);
  return view("shop.kosar",["termekek"=> $kosar->aruk,"teljesar"=>$kosar->teljesar]);
}*/

if (\Cart::session($uid)->isEmpty()) {
  return view("shop.kosar");
}else {
 $kosartartalom=\Cart::session($uid)->getContent();
 $kosar=$kosartartalom->toArray();
 $osszeg=\Cart::session($uid)->getTotal();
 $ossze=\Cart::session($uid)->getSubTotal();
 $osszdb=\Cart::session($uid)->getTotalQuantity();
 //dd($kosar,$ossze,$osszeg,$osszdb);
return view("shop.kosar",["kosar" => $kosar,"osszdb"=>$osszdb]);
}


}

public function kosarUpdate(Request $request){

  if(Auth::check()){
    $uid = Auth::user()->id;
  }else {
    $uid=Session::getId();
  }
$kosartartalom=\Cart::session($uid)->getContent();
$kosar=$kosartartalom->toArray();

if(isset($request["-1"])){
if($kosar[$request["-1"]]["quantity"]>1){
\Cart::session($uid)->update($request["-1"],array("quantity"=> -1));
}else if($kosar[$request["-1"]]["quantity"]==1){
  \Cart::session($uid)->remove($request["-1"]);
}

}else if(isset($request["remove"])) {
  $txt="Torles";
  //dd($request["remove"],$txt);
  \Cart::session($uid)->remove($request["remove"]);

}

$kosartartalom=\Cart::session($uid)->getContent();
$kosar=$kosartartalom->toArray();
$osszeg=\Cart::session($uid)->getTotal();
$ossze=\Cart::session($uid)->getSubTotal();
$osszdb=\Cart::session($uid)->getTotalQuantity();

return view("shop.kosar",["kosar" => $kosar,"osszdb"=>$osszdb]);
//return redirect()->route("kosar",["kosar" => $kosar,"osszdb"=>$osszdb]);
}

}
