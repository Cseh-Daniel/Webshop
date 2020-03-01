<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

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

  public function store(){

        if(!$this->validate(request(),[
        "name"=>"required",
        "email"=>"required|email|unique:users,email",
        "password"=>"required|confirmed|min:6"
      ])){
//állapotmegtartás
$data=request()->all();
return view("user.signup")->with("data",$data);

      }

      $user= User::create(request(["name","email","password"]));
      auth()->login($user);
      //\Mail::to($user->email)->send(new hello($user));
      return redirect("/")->with("ok","Sikeres regisztráció");



    }
}
