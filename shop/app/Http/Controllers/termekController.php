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



  $uid = Auth::user()->id;

  dd($request,$request["id"],$request["db"],$user);

  //dd($db);


/*
  $termekek=termekek::find($id);
  $regikosar=Session::has("kosar") ? Session::get("kosar") : null;
  $kosar=new kosar($regikosar);
  $kosar->add($termekek,$termekek->id);

  $request->session()->put("kosar",$kosar);
  //dd($request->session()->get("kosar"));
  return redirect()->route("home");
*/

}

public function kosarTartalom(){
  if(!Session::has("kosar")){
    return view("shop.kosar");
  }
  $regikosar=Session::get("kosar");
  $kosar=new kosar($regikosar);
  return view("shop.kosar",["termekek"=> $kosar->aruk,"teljesar"=>$kosar->teljesar]);
}

}
