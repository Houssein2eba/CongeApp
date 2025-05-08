<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
   // public function login(){
       // return view('login');
  //  }
    public function login(Request $request){
        $credentials =$request->only('email','password');
              if 
            (Auth::attempt($credentials)){
                return redirect()->route('home');
            }
            else {

                return back()->withErrors(['message'=>'These credentials do not match our records!'])->withInput();
           
        

            }
                
    }

    //public function home(){
      //  return view("home");
    //}
}
