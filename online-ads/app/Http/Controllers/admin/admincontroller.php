<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admincontroller extends Controller
{
    function check (Request $request){
        $admin= $request->validate([
             'email'=>'required|email|unique:users,email',
             'password'=>'required|min:5|max:30'
         
                 ]);
       if(!Auth()->guard('admin')->attempt(['email'=>$admin['email'],'password'=>$admin['password']]))
          {
              return back();
          }else
          {
             return redirect (route('admin.home'));  
          }
 
     }
     public function logout()
     {
 
      auth()->guard('admin')->logout();
 
             return redirect (route('admin.login'));
 
          
     }
 
}
