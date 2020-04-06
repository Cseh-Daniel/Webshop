<?php
namespace App\Http\Controllers;



use App\termekek;
use App\Gaddress;
use App\rendeles;
use Session;
use Auth;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class OrderingController extends Controller
{



  public function rendel(Request $request){;

$gaddress="";
$rendeles="";
$termek="";
$guest=0;
$email='';
if(!Auth::check()){
    if(!$this->validate(request(),[
    "nev"=>"required",
    "utca"=>"required",
    "hsz"=>"required",
    "easz"=>"nullable",
    "varos"=>"required",
    "irszam"=>"required",
    "phone"=>"required"

  ])){
//állapotmegtartás
$data=request()->all();
return view("shop.rendel")->with("data",$data);
  }

 $gaddress=new Gaddress;
$gaddress->nev=$request->input("nev");
$gaddress->email=$request->input("email");
$email=$request->input("email");
$gaddress->utca=$request->input("utca");
$gaddress->hsz=$request->input("hsz");
$gaddress->easz=$request->input("easz");
$gaddress->varos=$request->input("varos");
$gaddress->irszam=$request->input("irszam");
$gaddress->phone=$request->input("phone");
$gaddress->save();

}

    if(Auth::check()){
      $uid = Auth::user()->id;
      $aid=$uid;
      $email=Auth::user()->email;
    }else {
      $uid=Session::getId();
      $guest=1;
      $y=date("Y");
      $m=date("m");
      $d=date("d");

      $h=date("H");
      $mins=date("i");
      $s=date("s");
      $time=$h.":".$mins.":".$s;

      $bid=gaddress::select("id")->where("nev","=",$request->input("nev"))->whereYear("created_at","=",$y)->whereMonth("created_at","=",$m)->whereDay("created_at","=",$d)->whereTime("created_at","<=",$time)->limit(1)->get();
      $aid=$bid[0]["id"];
    }


    $kosartartalom=\Cart::session($uid)->getContent();
    $kosar=$kosartartalom->toArray();
    $osszeg=\Cart::session($uid)->getTotal();
    $osszdb=\Cart::session($uid)->getTotalQuantity();


    $oid=rand(1,1000000);
    foreach ($kosar as $k) {
      $rendeles=new rendeles;
      $termek=termekek::find($k["id"]);
      $termek["db"]=$termek["db"]-$k["quantity"];
      $termek->save();
      $rendeles->id=$oid;
      $rendeles->address_id=$aid;
      $rendeles->uid=$uid;
      $rendeles->guest=$guest;
      $rendeles->tnev=$k["name"];
      $rendeles->tdb=$k["quantity"];
      $rendeles->dbar=$k["price"];
      $rendeles->osszar=$k["quantity"]*$k["price"];
      $rendeles->save();
    }

  Mail::to($email)->send(new OrderMail($oid,$kosar,$osszeg,$osszdb));
\Cart::session($uid)->clear();
return redirect("/")->with('siker',"Sikeres rendelés!");
  }

}
