<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usercontroller extends Controller
{
    function create (Request $request){

        $request->validate([
    'first_name' => 'required',
    'last_name' => 'required',
    'email'=>'required|email|unique:users,email',
    'password'=>'required|min:5|max:30'

        ]);
        
        $user = User::create([
            'first_name' => request()->firstname,
            'last_name' => request()->lastname,
            'email' => request()->email,
            'password' => encrypt(request()->password),
           
        ]);


    }
        

    function check (Request $request){
       $user= $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30'
        
                ]);
      if(!Auth()->guard('web')->attempt(['email'=>$user['email'],'password'=>$user['password']]))
         {
             return back();
         }else
         {
            return redirect (route('user.home'));  
         }

    }
    public function logout()
    {

     auth()->guard('web')->logout();

            return redirect (route('user.login'));

         
    }


}