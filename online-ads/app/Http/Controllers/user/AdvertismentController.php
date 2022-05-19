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
USE Illuminate\Support\Facades\Storage;
use Stevebauman\Location\Facades\Location;
use Image;

// use Location;





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
    $data['images']=Imege::where('advertisment_id',$id)->get();
    return view ('dashboard.user.advertisment.edit',with($data));
}

###################update function#############
public function update ( Request $request,$id)
{
    // validation
    $request->validate([
        'title'=>'required|string|max:10',
        'desc'=>'required|string|max:50',
        'img'=>'required',
        'price'=>'required|numeric',
        'condition'=>'required|string',
        'category_id'=>'required',
    ]);
    // changecoverphoto
    $old_name=Advertisment::findOrfail($request->id)->img;
    if($request->hasFile('img')){
       Storage::disk('Uploads')->delete('Advertisments/'.$old_name);
       $new_name=$request->img->hashName();
       Image::make($request->img)->resize(50,50)->save(public_path('Uploads/Advertisments/'.$new_name));
       $request->img=$new_name;
  }else{
     
    $request->img= $old_name;
  }
     //   update
    Advertisment::findOrfail($id)->update([ 
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
    'img'=>$request->img,
    'category_id'=>$request->category_id,]);
    //  add sub pictures
     if($request->has('imgs')){
    foreach($request->file('imgs')as $image){
     $imagename ='advertisment.'.uniqid() .'.'.$image->getClientOriginalExtension();
      $image_resize = Image::make($image)->fit(250,270)->save(public_path('Uploads/Advertisments/'.$imagename));
            Imege::create([
                'adverttisment_id'=>$request->id,
                'image'=>$imagename
            ]);
        }
    }
    
     return view('dashboard.user.home');
}
##############delete sub pictures#########
public function deleteimage($id){
    $old_name=Imege::findOrfail($id)->image;
    unlink(public_path('Uploads/Advertisments/').$old_name);
    Imege::findOrfail($id)->delete();
      return back();

}
#################delete function##################
public function delete($id)
{
    $old_name=Advertisment::findOrfail($id)->img;
  
    unlink(public_path('Uploads/Advertisments/').$old_name);

    $old_names =Imege::where('advertisment_id',$id)->get();
    foreach ($old_names as $oldd) {
        unlink(public_path('Uploads/Advertisments/').$oldd->image);
        Imege::where('advertisment_id',$id)->delete();}
        Advertisment::findOrfail($id)->delete();
  
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
   ;     
   
   return view ('dashboard.user.advertisment.show',compact('Advertisment','rating','images','data'));
}

public function images($id){
     $advertisment = Advertisment::find($id);
   
     $images=Imege::where('advertisment_id',$id)->get();
    
    return view('dashboard.user.advertisment.show',compact('images','advertisment'));
}



}