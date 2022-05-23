<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\User;
use App\Models\imege;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

use Image;

class AdsController extends Controller
{
    public function index()
    {
        $data['ads']=Advertisment::get();
        
        $data['user']=User::get();
        $data['categories']=Category::get();
        

        return view('dashboard.admin.ads.index')->with($data);
    }

    public function accept($id){
          Advertisment::findOrfail($id)->update([
            'is_accepted'=>'1',

          ]);
          return back();
    }

    public function cancle($id){
        Advertisment::findOrfail($id)->delete();

    }

    public function create(){
        $data['categories']=category::select('id','name')->get();
        $data['users']=User::select('id','email')->get();

        return view('dashboard.admin.ads.create')->with($data);
    }
    public function store(Request $request){
       $request->validate([
            'title'=>'required|string|max:10',
            'desc'=>'required|string|max:50',
            'img'=>'required|image|mimes:jpg,png,jpeg',
            'price'=>'required|numeric',
            'condition'=>'required|string',
            'category_id'=>'required',
            'user_id'=>'required',
            'is_active'=>'nullable',
            'is_accepted'=>'nullable',


        ]);
        $new_name=$request->img->hashName();
         Image::make($request->img)->resize(50,50)->save(public_path('Uploads/advertisments/'.$new_name));
         if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        if (!$request->has('is_accepted'))
            $request->request->add(['is_accepted' => 0]);
        else
            $request->request->add(['is_accepted' => 1]);

         $ads= Advertisment::create([
           'title'=>$request->title,
           'desc'=>$request->desc,
           'price'=>$request->price,
           'condition'=>$request->condition,
            'img'=>$new_name,
            'category_id'=>$request->category_id,
            'user_id'=>$request->user_id,
            'is_accepted' => $request->is_accepted,
            'is_active' => $request->is_active
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
        return redirect('admin/advertisment/index');
       
       }
       //edit function

public function edit($id){
 
    $advertisment=Advertisment::findOrfail($id);
    $categories=category::get();
    
    $images=Imege::where('advertisment_id',$id)->get();
    $users=User::where('id',$advertisment->user_id)->get();
    if( $advertisment )
{
    return Response::json(array(
        'status'=>200,
        'advertisment'=>$advertisment,
        'images'=>$images,
        'users'=>$users,
    ));



   
}

else
{
    return response()->json( [
        
        'status'=>404,
        
        'advertisment'=>'not found',
      
    
    ]);
}
if( $images){
return response()->json( [
        
    'status'=>200,
    'images'=>$images,
    
]);}
else
{
    return response()->json( [
        
        'status'=>404,
        'images'=>'not found',
      
    
    ]);
}
if( $user){
    return response()->json( [
            
        'status'=>200,
        'user'=>$user,
        
    ]);}
    else
    {
        return response()->json( [
            
            'status'=>404,
            'user'=>'not found',
          
        
        ]);
    }
dd($response);
    
    // return view ('dashboard.admin.ads.index')->with($data);

}
//store function

public function update(Request $request,$id){

    $validator=Validator::make($request->all(),[
        'title'=>'required|string|max:10',
        'desc'=>'required|string|max:50',
        'img'=>'nullable|image|mimes:jpg,png,jpeg',
       
        'price'=>'required|numeric',
        'condition'=>'required|string',
        'category_id'=>'required',
        'user_id'=>'required',
       

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
        $ad->user_id = $request->input('user_id');
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
     //  add sub pictures
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
     
 }}
      

     

}
// delete sub
public function deleteimage($id){
    $old_name=Imege::findOrfail($id)->image;
    unlink(public_path('Uploads/Advertisments/').$old_name);
    Imege::findOrfail($id)->delete();
      return back();

}
// end
public function delete($id){
    // Advertisment::findOrfail($id)->delete();
    
    $old_name=Advertisment::findOrfail($id)->img;
  
    unlink(public_path('Uploads/Advertisments/').$old_name);

    $old_names =Imege::where('advertisment_id',$id)->get();
    foreach ($old_names as $oldd) {
        unlink(public_path('Uploads/Advertisments/').$oldd->image);
        Imege::where('advertisment_id',$id)->delete();}
        Advertisment::findOrfail($id)->delete();
    return back();
}
public function search( Request $request)
{
    $keyword=$request->keyword;
    $advertisments=Advertisment::where('title','like',"%$keyword%")->with('user','category')->get();
  
    return response()->json( $advertisments);
    
dd($advertisments);


}


    }


