<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Adresses;

class RegController extends Controller
{
  /*public function store(Request $request){

    $this->validate($request,[
      "name" => "required",
      "email" => "email|required|unique:users",
      "password" => "required|min:4"
    ]);

    $user=new User([

      "name"=>$request->input("name"),
      "email"=>$request->input("email"),
      "password"=>bcrypt($request->input("password"))
    ]);
    $user->save();
    return redirect()->route("home");
  }*/

  public function store(Request $request){

        if(!$this->validate(request(),[
        "name"=>"required",
        "email"=>"required|email|unique:users,email",
        "password"=>"required|confirmed|min:6",
        "utca"=>"required",
        "hsz"=>"required",
        "easz"=>"nullable",
        "varos"=>"required",
        "irszam"=>"required",
        "role_id"

      ])){
//állapotmegtartás
$data=request()->all();
return view("user.signup")->with("data",$data);
      }

      $user= User::create(request(["name","email","password","role_id"]));
      $adress= new Adresses;
      $adress->id=$user["id"];
      //$adress=request(["utca","hsz","easz","varos","irszam"]);
      $adress->utca=$request["utca"];
      $adress->hsz=$request["hsz"];
      $adress->easz=$request["easz"];
      $adress->varos=$request["varos"];
      $adress->irszam=$request["irszam"];
      $adress->save();
      auth()->login($user);

      //\Mail::to($user->email)->send(new hello($user));
      return redirect("/")->with("ok","Sikeres regisztráció");



    }
}
