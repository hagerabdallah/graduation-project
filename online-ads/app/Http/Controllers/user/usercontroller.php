<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\MatchOldPassword;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Image;




class UserController extends Controller
{
    public function create (Request $request){
        
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:5|max:30',
        'phone'=>'required',
        'img'=>'image|mimes:jpg,png,jpeg',
        'city'=>'required',
        ]);
        $new_name=$request->img->hashName();
        Image::make($request->img)->resize(50,50)->save(public_path('Uploads/advertisments/'.$new_name));

        
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
    
            // $is_login=$request->only('email','password');
            if(auth::attempt(['email' => $request->email,'password' => $request->password]) )
            {
                return redirect()->route('user.home');
            }
            else
            {
                return back()->with('fail','Something went wrong, failed to update');
            }
    

    }
    
    
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
    public function edit()
    {
        
        // $user=DB::table('users')->where('id',auth()->id())->first();

        $user=User::where('id',auth()->id())->first();
        return view ('dashboard.user.profile.edit',compact('user'));
    }



    
    public function update (Request $request){
        
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'phone'=>'required',
        'img'=>'image|mimes:jpg,png',
        'city'=>'required',
        ]);
        
        $user=User::findOrfail(Auth()->id())->update ([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'img'=>$request->img,
            'phone'=>$request->phone,
            'city'=>$request->city,
           
        ]);
     

      
       if( $user)
                  {
                    return view('dashboard.user.home')->with('success',' successfully');
                  }


                  else{  return back()->with('fail','Something went wrong, failed to update');}
               

                
            }

public function changepass(){

return view('dashboard.user.profile.changepass');

}

public function storepass(Request $request)
{
    $request->validate([
        'current_password' => ['required', new MatchOldPassword],
        'new_password' => ['required'],
        'new_confirm_password' => ['same:new_password'],
    ]);

    User::findOrfail(auth()->id())->update(['password'=> Hash::make($request->new_password)]);

    dd('Password change successfully.');
}


    
    


  


}