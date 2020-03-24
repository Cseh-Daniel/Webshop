<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Session;

use App\User;
use Auth;

class UserController extends Controller
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

      $this->validate(request(),[
        "email"=>"required|email",
        "password"=>"required"
      ]);

    if(Auth::attempt(["email"=> $request->input("email"), "password" => $request->input("password")])){

        //return redirect()->back();
        return back()->with("siker","Sikeres bejelentkezés!");
    }else if(auth()->attempt(request(["email","password"]))==false){
      return back()->withErrors(["message"=>"A jelszó vagy e-mail nem eggyezik, próbálja újra."]);
    }


    }

    public function showProfile(){

      return view("user.profile");

    }

    public function destroy(){

      auth()->logout();
      return redirect()->to("/");

    }

}
