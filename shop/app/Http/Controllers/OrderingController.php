<?php
namespace App\Http\Controllers;
require_once 'F:/.git_web/shop/library/BarionClient.php';



use App\termekek;
use App\Gaddress;
use App\rendeles;
use Session;
use Auth;

use Illuminate\Http\Request;

class OrderingController extends Controller
{



  public function rendel(Request $request){

    $myPosKey="1fdaf6de06854b7fb47b0f5347f696e1";
    $apiVersion = 2;
    $environment = BarionEnvironment::Test;
    $BC = new BarionClient($myPosKey, $apiVersion, $environment);

$item= new ItemModel();
$gaddress="";
$rendeles="";
$termek="";
$guest=0;
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
    }else {
      $uid=Session::getId();
      $guest=1;
      $y=date("Y");
      $m=date("m");
      $d=date("d");
      $bid=gaddress::select("id")->where("nev","=",$request->input("nev"))->whereYear("created_at","=",$y)->whereMonth("created_at","=",$m)->whereDay("created_at","=",$d)->limit(1)->get();
      $aid=$bid[0]["id"];
    }


    $kosartartalom=\Cart::session($uid)->getContent();
    $kosar=$kosartartalom->toArray();
    $osszeg=\Cart::session($uid)->getTotal();
    $osszdb=\Cart::session($uid)->getTotalQuantity();
    dd($kosar);


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
      $rendeles->save();

      $item->Name = $k["name"];
      $item->Description = "";
      $item->Quantity = $k["quantity"];
      $item->Unit = "piece";
      $item->UnitPrice = 1000;
      $item->ItemTotal = 1000;
      $item->SKU = $k["id"];
    }
\Cart::session($uid)->clear();
return redirect("/")->with('siker',"Sikeres rendelés!");
  }

}
