<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\advertisment;
use App\Models\auction;
use App\Models\imege;
use App\Models\auctiontable;
use App\Models\price;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Image;

class ClientsController extends Controller
{
  public function index()
  {
    $users=User::get();
    return view('dashboard.admin.clients.index',compact('users'));
  }
  public function create()
  {
    return view ('dashboard.admin.clients.create');
  }
    public function check (Request $request){
        
        $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:5|max:30',
        'cpassword'=>'required|same:password',
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
                    return view('dashboard.admin.home');
                  }
       else
       {
         return back();
       }

                
               

                
            }
            public function delete($id)
            {
              //delete advertisment
              $ads=Advertisment::where('user_id',$id)->get();
              foreach ($ads as $ad) {
                
                  
                  // sub
                  $old_names =Imege::where('advertisment_id',  $ad->id)->get();
                  foreach ($old_names as $oldd) {
                      unlink(public_path('Uploads/Advertisments/').$oldd->image);
                      Imege::where('advertisment_id', $ad->id)->delete();
                  }
                   // cover
                   unlink(public_path('Uploads/Advertisments/').$ad->img);
                  Advertisment::where('id',$ad->id)->delete();
                      
                  }
                  //end delete advertisment
                  // delete auction
                  $auctions=Auction::where('user_id',$id)->get();
                  foreach ($auctions as $auction) {
                     
                  // delet price
                  $prices=price::where('auction_id',$auction->id)->get();
                   foreach($prices as $price)
                     {
                       price::where('auction_id',$auction->id)->delete();

                        }
                     
                     
                      
                      // sub
                      $old_names =auctiontable::where('auction_id',  $auction->id)->get();
                      foreach ($old_names as $oldd) {
                          unlink(public_path('Uploads/auctions/').$oldd->image);
                          auctiontable::where('auction_id',  $auction->id)->delete();
                      }
                       // cover
                       unlink(public_path('Uploads/auctions/').$auction->img);
                     auction::where('id', $auction->id)->delete();
                          
                      }
                  // user
        
              $old_name=User::findOrfail($id)->img;
  
              unlink(public_path('Uploads/users/').$old_name);
          
           
                  User::findOrfail($id)->delete();
                  return back();
            }
  //search
  public function search( Request $request)
  {
      $keyword=$request->keyword;
      $users=User::where('first_name','like',"%$keyword%")->get();
    
      return response()->json( $users);
      
  
  
  
  }
}
