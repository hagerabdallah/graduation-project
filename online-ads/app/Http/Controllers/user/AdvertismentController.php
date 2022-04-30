<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\User;
use App\Models\Favoriets;
use App\Models\Rating;
use Illuminate\Http\Request;
use Image;

class AdvertismentController extends Controller
{
    //index

    public function index()
    {
        $data['advertisment']=Advertisment::where('user_id', auth()->id())->where('is_accepted','1')->get();
        $data['categories']=category::get();
        return view('dashboard.user.advertisment.index')->with($data);

    }
    


    //add advertisment
public function create()
 {
     
    $data['categories']=category::select('id','name')->get();
    return view('dashboard.user.advertisment.create')->with($data);
 }
 public function store(Request $request)
{
 $request->validate([
     'title'=>'required|string|max:10',
     'desc'=>'required|string|max:50',
     'img'=>'required|image|mimes:jpg,png,jpeg',
     'price'=>'required|numeric',
     'condition'=>'required|string',
     'category_id'=>'required',
 ]);
 //move
//  $img=$request->file('img');
//  $ext=$img->getClientOriginalExtension();
//  $name="advertisment-".uniqid().".$ext";
//  $img->move(public_path('uploades/advertisments'),$name);
$new_name=$request->img->hashName();
Image::make($request->img)->resize(50,50)->save(public_path('Uploads/advertisments/'.$new_name));

 Advertisment::create([
    'user_id' => Auth()->id(),
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
     'img'=>$new_name,
     'category_id'=>$request->category_id,
 ]);
 return view('dashboard.user.home');

}
//update
public function edit($id)
{
    $data['categories']= category::select('id','name')->get();
    $data['user']=Auth()->id();
    $data['advertisment']=Advertisment::findOrfail($id);
    return view ('dashboard.user.advertisment.edit',with($data));
}
public function update ( Request $request,$id)
{
    $request->validate([
        'title'=>'required|string|max:10',
        'desc'=>'required|string|max:50',
        'img'=>'required',
        'price'=>'required|numeric',
        'condition'=>'required|string',
        'category_id'=>'required',
    ]);
    Advertisment::findOrfail($id)->update([ 
    // 'user_id' => Auth()->id(),
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
     'img'=>$request->img,
     'category_id'=>$request->category_id,]);
     return view('dashboard.user.home');
}
public function delete($id)
{
    $advertisment=Advertisment::findOrfail($id);
    // unlink(public_path('uploades/books/').$books->img);
    unlink(public_path('uploades/advertisments').$advertisment->img);
    $advertisment->delete();
    return back();
}
public function addtowishlist(Request $request)
{
      //im
        // $advertisement->users()->attach([
        //    'user_id' => Auth()->id(),
        // ]);
        // $users->advertisment()->attach(['advertisment_id' => $request->advertisment_id,]);
    $request->validate( [
        'advertisment_id' => 'exists:advertisments,id'
    ]);
    // perfect cod
    $users=User::where('id',Auth()->id())->first();
   
//     $users->save();
//     $advertisment=Advertisment::first();
//     $users=$users->advertisment()->attach(['advertisment_id'=>$request->advertisment_id]);
//end
 
   $fav=$users->advertisment()->where('advertisment_id',$request->advertisment_id)->count();
    

    
//      $user_id = auth()->id();

//     $fav=Favoriets::where('user_id', Auth()->id())
//         ->where('advertisment_id',$request->advertisment_id)
//         ->count();
    if ($fav == 0) {
        $users=User::where('id',Auth()->id())->first();
   
        $users->save();
        $advertisment=Advertisment::first();
        $users=$users->advertisment()->attach(['advertisment_id'=>$request->advertisment_id]);}


//    Favoriets::create([
//     'user_id' => Auth()->id(),
//    'advertisment_id' =>$request->advertisment_id,
// ]);
//     }
     else {
        $users=User::where('id',Auth()->id())->first();
   
      
        $advertisment=Advertisment::first();
        $users=$users->advertisment()->detach(['advertisment_id'=>$request->advertisment_id]);}
//         Favoriets::where('user_id', $user_id)
//             ->where('advertisment_id', $request->advertisment_id)
//             ->delete();
//     }
    return redirect()->back();

}
public function favoriets()

{ 
    // $advertisment=Advertisment::get();
    $users=User::where('id',Auth()->id())->first();
    $favoriets=$users->advertisment()->get();
    
    return view('dashboard.user.favoriets',compact('users'));
}
public function show ($id)
{
    $rating=Rating::where('advertisment_id',$id)->avg('rating');
   
    $Advertisment=Advertisment::findOrfail($id);
   
   return view ('dashboard.user.advertisment.show',compact('Advertisment','rating'));
}




}