<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\User;
use App\Models\Favoriets;
use App\Models\Rating;
use App\Models\Imege;
use Illuminate\Http\Request;
use Image;

class AdvertismentController extends Controller
{
 #####################index#########################
 
    public function index()
    {
        $data['advertisment']=Advertisment::where('user_id', auth()->id())->where('is_accepted','0')->get();
        $data['categories']=category::get();
        return view('dashboard.user.advertisment.index')->with($data);

    }
    


 ##################create function###################
public function create()
 {
     
    $data['categories']=category::select('id','name')->get();
    return view('dashboard.user.advertisment.create')->with($data);
 }
#################store function########################

 public function store(Request $request)
{
 $request->validate([
     'title'=>'required|string|max:10',
     'desc'=>'required|string|max:50',
     'img'=>'required|image|mimes:jpg,png,jpeg',
     'price'=>'required|numeric',
     'condition'=>'required|string',
     'category_id'=>'required',
    //  'imges'=>'required|image|mimes:jpg,png,jpeg',
 ]);

$new_name=$request->img->hashName();
Image::make($request->img)->resize(50,50)->save(public_path('Uploads/advertisments/'.$new_name));

 $ads=Advertisment::create([
    'user_id' => Auth()->id(),
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
     'img'=>$new_name,
     'category_id'=>$request->category_id,
 ]);
 if($request->has('images')){
    foreach($request->file('images')as $image){
$imagename ='advertisment.'.uniqid() .'.'.$image->getClientOriginalExtension();
$image_resize = Image::make($image)->fit(250,270)->save(public_path('Uploads/advertisments/'.$imagename));
  

        Imege::create([
            'advertisment_id'=>$ads->id,
            'image'=> $imagename
        ]);
    }
}
 return view('dashboard.user.home');

}
#################edit function##################
public function edit($id)
{
    $data['categories']= category::select('id','name')->get();
    $data['user']=Auth()->id();
    $data['advertisment']=Advertisment::findOrfail($id);
    return view ('dashboard.user.advertisment.edit',with($data));
}

###################update function#############
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
#################delete function##################
public function delete($id)
{
    $advertisment=Advertisment::findOrfail($id);
    // unlink(public_path('uploades/books/').$books->img);
    unlink(public_path('uploades/advertisments').$advertisment->img);
    $advertisment->delete();
    return back();
}
###################add to wishlist function##########
public function addtowishlist(Request $request)
{
     
    $request->validate( [
        'advertisment_id' => 'exists:advertisments,id'
    ]);
   
    $users=User::where('id',Auth()->id())->first();
 
   $fav=$users->advertisment()->where('advertisment_id',$request->advertisment_id)->count();

    if ($fav == 0) {
        $users=User::where('id',Auth()->id())->first();
   
        $users->save();
        $advertisment=Advertisment::first();
        $users=$users->advertisment()->attach(['advertisment_id'=>$request->advertisment_id]);}


     else {
        $users=User::where('id',Auth()->id())->first();
   
      
        $advertisment=Advertisment::first();
        $users=$users->advertisment()->detach(['advertisment_id'=>$request->advertisment_id]);}

    return redirect()->back();

}
#######################show favoriets###############
public function favoriets()

{ 
    // $advertisment=Advertisment::get();
    $users=User::where('id',Auth()->id())->first();
    $favoriets=$users->advertisment()->get();
    
    return view('dashboard.user.favoriets',compact('users'));
}
#######################ahow advertisments
public function show ($id)
{
    $rating=Rating::where('advertisment_id',$id)->avg('rating');
   
    $Advertisment=Advertisment::findOrfail($id);
    $images=Imege::select('image');
   
   return view ('dashboard.user.advertisment.show',compact('Advertisment','rating','images'));
}
public function showad($id)
{
    $data['categories']= category::select('id','name')->get();
    $data['user']=Auth()->id();
    $data['advertisment']=Advertisment::findOrfail($id);
    $data['images']=Imege::select('image');
    return view ('dashboard.user.advertisment.showad',with($data));


}
public function images($id){
     $advertisment = Advertisment::find($id);
   
     $images=Imege::where('advertisment_id',$id)->get();
    
    return view('dashboard.user.advertisment.show',compact('images','advertisment'));
}



}