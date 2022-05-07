<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;

class ClientsController extends Controller
{
    public function create (Request $request){
        
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:5|max:30',
        'phone'=>'required',
        'img'=>'required|image|mimes:jpg,png,jpeg',
        'city'=>'required',
        ]);
        $new_name=$request->img->hashName();
        Image::make($request->img)->resize(50,50)->save(public_path('Uploads/users/'.$new_name));

        
        $user=User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
            'img'=>$new_name,
            'phone'=>$request->phone,
            'city'=>$request->city,
           
        ]);

      
        if( $user)
                  {
                    return back()->with('success',' successfully');
                  }


                  else{  return back()->with('fail','Something went wrong, failed to update');}
               

                
            }
}
