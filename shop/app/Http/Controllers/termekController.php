<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\termekek;

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

}
