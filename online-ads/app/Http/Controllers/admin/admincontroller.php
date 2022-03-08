<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function check (Request $request){
        $request->validate(
            [
                'email'=>'required|email|exists:admins,email',
                'password'=>'required|min:5|max:30',
        
            ]);
            $creds=$request->only('email','password');
            if(Auth::guard('admin')->attempt($creds))
            {
            return view('dashboard.admin.home');
            }
            else{
                return redirect()->route('admin.login')->with('fail','Incorrect credentials');
            }
 
     }
     public function logout()
     {
 
        Auth::guard('admin')->logout();
      return view('dashboard.admin.login');
        
   
     }
 
}
