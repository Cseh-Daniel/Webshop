<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Session;

use App\User;
use App\Adresses;
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
        return redirect()->back()->with('siker',"Sikeres bejelentkezés!");
    }else if(auth()->attempt(request(["email","password"]))==false){
      return back()->withErrors(["message"=>"A jelszó vagy e-mail nem eggyezik, próbálja újra."]);
    }


    }

    public function showProfile(){
      $uid=Auth::user()->id;
      $address=adresses::find($uid);
      return view("user.profile")->with("address",$address);

    }

    public function addressupdate(Request $request){
      $uid=Auth::user()->id;
      $this->validate(request(),[
        "varos"=>"required",
        "irszam"=>"required",
        "utca"=>"required",
        "hsz"=>"required",
        "easz"=>""
      ]);
      $address=adresses::find($uid);
      $address["varos"]=$request->input("varos");
      $address["irszam"]=$request->input("irszam");
      $address["utca"]=$request->input("utca");
      $address["hsz"]=$request->input("hsz");
      $address["easz"]=$request->input("easz");
      $address->save();
      return redirect()->back()->with("siker","Sikeres adat frissítés!");
    }

    /*public function pwupdate(Request $request){

      $uid=Auth::user()->id;
      $this->validate(request(),[
        "password"=>"required",
        "newpassword"=>"required|confirmed"
      ]);
      $user=User::find($uid);
      if (Auth::attempt(["email"=>$user["email"],"password" => $request->input("password")])) {
        $user["password"]=bcrypt($request->input("newpassword"));
        $user->save();

      }else if(Auth::attempt(["email"=>$user["email"],"password" => $request->input("password")])==false){
        return back()->withErrors(["message"=>"A jelszó nem eggyezik, próbálja újra."]);
      }

      return redirect()->back()->with("siker","Sikeres jelszó csere!");
    }*/


    public function destroy(){

      auth()->logout();
      return redirect()->to("/");

    }

}
