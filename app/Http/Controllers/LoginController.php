<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Flashy;
use \Illuminate\Support\Carbon;

class LoginController extends Controller
{   
    
    public function index(){
       //
     }

     public function edit($id){
       //
    }

     public function update(Request $request, $id){
      //
     }
     
    public function login(Request $request)
    {
     
     $mytime = Carbon::now(-4)->format('l jS \\of F Y ');   
     if(Auth::attempt([
        'email'=> $request->email,
        'password'=>$request->password
       ]))
       {
           $user = User::where('email', $request->email)->first(); 
           Flashy::message('Bievenue');
           
           if($user->is_Admin())
           {              
            return redirect()->route('pageAdmin');
           }
          
          return redirect()->route('home')->with('info', 'Bienvenue  '.$user->name."  on est:".$mytime);
       }
       return redirect()->back();
   }
}
