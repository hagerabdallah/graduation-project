<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserController extends Controller
{
    public function create (Request $request){
        
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:5|max:30',
        'phone'=>'required',
        'img'=>'image|mimes:jpg,png',
        'city'=>'required',
        ]);
        
        
        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'img'=>$request->img,
            'phone'=>$request->phone,
            'city'=>$request->city,
           
        ]);

      
        if( $user)
                  {
                    Auth::login($user);
                    return view('dashboard.user.home')->with('success',' successfully');
                  }


                  else{  return back()->with('fail','Something went wrong, failed to update');}
               

                
            }
    
        

    public function check (Request $request){
        $request->validate(
            [
                
                'email'=>'required|email|exists:users,email',
                'password'=>'required|min:5|max:30',
                
    
            ]);
    
            $is_login=$request->only('email','password');
            if(auth::attempt($is_login) )
            {
                return redirect()->route('user.home');
            }
            else
            {
                return redirect()->route('user.login');
            }
    

    }
    
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }


}