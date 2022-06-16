<?php

namespace App\Http\Controllers\user;
use App\Models\User;
use App\Models\Imege;
use App\Models\Rating;
use App\Models\category;
use App\Models\Favoriets;
use App\Models\Advertisment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
USE Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;

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

     #####################fetchadvertisment#########################

    public function fetchadvertisment()
    {    $id = Auth::id();


        // $advertisment = Advertisment::where('user_id', Auth()->id())->with('category')->get();
        $advertisment = Advertisment::where('user_id',$id)->with('category')->get();

        // $images=Imege::where('advertisment_id',$advertisment->id)->get();
        if( $advertisment )
        {
            return Response::json(array(
                'advertisment'=>$advertisment,

                // 'images'=>$images,
            ));
        }
   
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
     'is_active'=>'nullable',
     'address'=>'required'
    //  'imges'=>'required|image|mimes:jpg,png,jpeg',
 ]);
 if (!$request->has('is_active')){
    $request->request->add(['is_active' => 0]);

 }
        else{
            $request->request->add(['is_active' => 1]);

        }
$new_name=$request->img->hashName();
Image::make($request->img)->resize(612,408)->save(public_path('Uploads/advertisments/'.$new_name));

 $ads=Advertisment::create([
    'user_id' => Auth()->id(),
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
     'img'=>$new_name,
     'category_id'=>$request->category_id,
     'is_active' => $request->is_active,
     'address'=>$request->address

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
return redirect('user/advertisment/index');

}
#################edit function##################
public function edit($id)
{    $advertisment=Advertisment::findOrfail($id);
     $categories= category::where('id',$advertisment->category_id)->get();
     $user=Auth()->id();
    $images=Imege::where('advertisment_id',$id)->get();
    if( $advertisment )
    {
        return Response::json(array(
            'status'=>200,
            'advertisment'=>$advertisment,
            'images'=>$images,
            'categories'=>$categories
        ));
    }
    
    else
    {
        return response()->json( [
            
            'status'=>404,
            
            'advertisment'=>'not found',
          
        
        ]);
}}

###################update function#############
public function update ( Request $request,$id)
{
    // validation
    $validator=Validator::make($request->all(),[
        'title'=>'required|string|max:10',
        'desc'=>'required|string|max:50',
        'img'=>'nullable|image|mimes:jpg,png,jpeg',
        'price'=>'required|numeric',
        'condition'=>'required|string',
        'category_id'=>'required',
    ]);

    if($validator->fails())
    {
        return response()->json( [
        
            'status'=>400,
            'errors'=>$validator->messages()
            
        ]); 
    }
   else{
    
    $ad=Advertisment::findOrfail($id);

    if($ad){

        $ad->title = $request->input('title');
        $ad->desc = $request->input('desc');
        $ad->price = $request->input('price');
        $ad->condition = $request->input('condition');
        $ad->category_id = $request->input('category_id');
        if (!$request->has('is_active')){
            $request->request->add(['is_active' => 0]);

        }
        else{
            $request->request->add(['is_active' => 1]);

        }
        $ad->is_active =$request->is_active;
        // cover
    $old_name=Advertisment::findOrfail($request->id)->img;
    if($request->hasFile('img')){
    //  Storage::disk('Uploads')->delete('Advertisments/'.$old_name);
     unlink(public_path('Uploads/Advertisments/').$old_name);
     $new_name=$request->img->hashName();
     Image::make($request->img)->resize(50,50)->save(public_path('Uploads/Advertisments/'.$new_name));
     $ad->img=$new_name;
    }
    else{
   
    $ad->img= $old_name;
   }
//    end cover

$ad->save();
if($request->has('imgs')){
         
         
    foreach($request->file('imgs')as $image){
     $imagename ='advertisment.'.uniqid() .'.'.$image->getClientOriginalExtension();
      $image_resize = Image::make($image)->fit(250,270)->save(public_path('Uploads/Advertisments/'.$imagename));
            Imege::create([
                'advertisment_id'=>$request->id,
                'image'=>$imagename
            ]);
        }
    }
    

return response()->json( [
    
    'status'=>200,
    'message'=>'success',
    
]); 
}
else
{
return response()->json( [
    
    'status'=>404,
    'message'=>'fail',
    
]); 
 
}
    
}}
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
    $Advertisment = Advertisment::find($id);
    if($Advertisment)
    {    //delete imgs
        $old_name=Advertisment::findOrfail($id)->img;
  
        unlink(public_path('Uploads/Advertisments/').$old_name);
    
        $old_names =Imege::where('advertisment_id',$id)->get();
        foreach ($old_names as $oldd) {
            unlink(public_path('Uploads/Advertisments/').$oldd->image);
            Imege::where('advertisment_id',$id)->delete();}
       //delete sub-imgs
        $Advertisment->delete();
        return response()->json([
            'status'=>200,
            'message'=>'advertisment Deleted Successfully.'
        ]);


    }
    else
    {
        return response()->json([
            'status'=>404,
            'message'=>'No Student Found.'
        ]);
    }
   
  
    

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

public function search( Request $request)
{    $id = Auth::id();
    $keyword=$request->keyword;
    $advertisments=Advertisment::where('title','like',"%$keyword%")->where('user_id',$id)->with('user','category')->get();
  
    return response()->json( $advertisments);
    
// dd($advertisments);


}



}