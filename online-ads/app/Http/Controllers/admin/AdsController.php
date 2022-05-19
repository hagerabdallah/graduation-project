<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\User;
use App\Models\imege;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Image;

class AdsController extends Controller
{
    public function index(){
        $data['ads']=Advertisment::get();

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
 
    $data['advertisment']=Advertisment::findOrfail($id);
    $data['categories']=category::select('id','name')->get();
    $data['users']=User::select('id','email')->get();
    return view ('dashboard.admin.ads.edit')->with($data);

}
//store function

public function update(Request $request,$id){
    $request->validate([
        'title'=>'required|string|max:10',
        'desc'=>'required|string|max:50',
        'img'=>'required',
        'price'=>'required|numeric',
        'condition'=>'required|string',
        'category_id'=>'required',
        'user_id'=>'required',


    ]);
    Advertisment::findOrfail($id)->update([ 
    // 'user_id' => Auth()->id(),
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
     'img'=>$request->img,
     'category_id'=>$request->category_id,
     'user_id'=>$request->user_id,

    ]);
     return view('dashboard.admin.home');

}
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


