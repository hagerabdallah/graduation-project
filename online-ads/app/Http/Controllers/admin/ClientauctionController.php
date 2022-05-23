<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\auctiontable;
use App\Models\Auction;
use App\Models\price;
use Image;

class ClientauctionController extends Controller
{
    //
    public function index()
    {
        $data['auction']=Auction::get();
        $data['users']=User::get();
        
        return view('dashboard.admin.auctions.index')->with($data);
    }
    public function accept($id)
    {
        Auction::findOrfail($id)->update([
            'is_accepted'=>'1',
        ]);
        return back();
    }
    public function cancle ($id)
    {
        Auction::findOrfail($id)->delete();
    }
    public function create()
    {
       
        $data['users']= User::select('id','email')->get();
        return view('dashboard.admin.auctions.create')->with($data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'desc'=>'required|string|max:100',
            'start_date'=>'required',
            'end_date'=>'required',
            'img'=>'nullable|image|mimes:jpg,png,jpeg',
            'min_price'=>'required|numeric',
            'condition'=>'required',
            'user_id'=>'required',
         ]);
         $newname=$request->img->hashName();
         Image::make($request->img)->resize(50,50)->save(public_path('Uploads/auctions/'.$newname));
         $request->img=$newname;
         if (!$request->has('is_active'))
         $request->request->add(['is_active' => 0]);
     else
         $request->request->add(['is_active' => 1]);

     if (!$request->has('is_accepted'))
         $request->request->add(['is_accepted' => 0]);
     else
         $request->request->add(['is_accepted' => 1]);

         $newauction=Auction::create([
                'user_id' => $request->user_id,
                'name'=>$request->name,
                'desc'=>$request->desc,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'img'=>$request->img,
                'min_price'=>$request->min_price,
                'condition'=>$request->condition,
                'is_accepted' => $request->is_accepted,
                'is_active' => $request->is_active
         
            ]);
            if($request->has('imgs')){
                foreach($request->file('imgs')as $image){
            
              $imagename ='auction.'.uniqid() .'.'.$image->getClientOriginalExtension();
              $image_resize = Image::make($image)->fit(250,270)->save(public_path('Uploads/auctions/'.$imagename));
                    auctiontable::create([
                        'auction_id'=>$newauction->id,
                        'image'=>$imagename
                    ]);
                }
            }
        return view('dashboard.admin.home');
       
    }
    public function edit($id)
    {
      
        $auction= Auction::findOrfail($id);
        $images=auctiontable::where('auction_id',$id)->get();
        $users=User::where('id',$auction->user_id)->get();
        
        if( $auction )
        {
            return Response::json(array(
                'status'=>200,
                'auction'=>$auction,
                'images'=>$images,
                'users'=>$users,
            ));
        
        
        
           
        }
        
        else
        {
            return response()->json( [
                
                'status'=>404,
                
                'auction'=>'not found',
              
            
            ]);
        }
    }
    public function update(Request $request,$id)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'desc'=>'required|string|max:100',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'img'=>'nullable|image|mimes:jpg,png,jpeg',
            'min_price'=>'required|numeric',
            'condition'=>'required',
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
         $auction=Auction::findOrfail($id);
         if($auction)
         {
         $auction->name = $request->input('name');
         $auction->desc = $request->input('desc');
         $auction->min_price = $request->input('min_price');
         $auction->condition = $request->input('condition');
         $auction->start_date = $request->input('start_date');
         $auction->end_date = $request->input('end_date');
        
         
         $auction->user_id = $request->input('user_id');
         //cover
         $old_name=Auction::findOrfail($request->id)->img;
         if($request->hasFile('img')){
            unlink(public_path('Uploads/Auctions/').$old_name);
            // Storage::disk('Uploads')->delete('Auctions/'.$old_name);
            $new_name=$request->img->hashName();
            Image::make($request->img)->resize(50,50)->save(public_path('Uploads/Auctions/'.$new_name));
            $request->img=$new_name;
       }else{
           $request->img= $old_name;
       }
         //endcover
         $auction->save();
        // sub images

          //  add sub pictures
          if($request->has('imgs')){
            foreach($request->file('imgs')as $image){
        
          $imagename ='auction.'.uniqid() .'.'.$image->getClientOriginalExtension();
          $image_resize = Image::make($image)->fit(250,270)->save(public_path('Uploads/auctions/'.$imagename));
                auctiontable::create([
                    'auction_id'=>$request->id,
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
    public function delete($id)
    {
    // delete price table
     $prices=price::where('auction_id',$id)->get();
    foreach($prices as $price)
    {
        price::where('auction_id',$id)->delete();

    }
    
//delete subimage
    $old_names =auctiontable::where('auction_id',$id)->get();
    foreach ($old_names as $oldd) {
        unlink(public_path('Uploads/Auctions/').$oldd->image);
        auctiontable::where('auction_id',$id)->delete();}
    //delete auction and cover image
        $old_name=Auction::findOrfail($id)->img;
       unlink(public_path('Uploads/Auctions/').$old_name);
        Auction::findOrfail($id)->delete();
        return back();
    }
    //bidders
    public function bidders_info($id){
        $auction=auction::findOrfail($id)->get();
        $info= Price::where('auction_id',$id)->latest()->get();

        $inf=$info->unique('user_id');
        // $users=User::where ('id',$inf->user_id)->get();
        return view ('dashboard.admin.auctions.auctiondetials',compact('inf','auction'));
        
 
   }
   //search
   public function search( Request $request)
{
    $keyword=$request->keyword;
    $auctions=auction::where('name','like',"%$keyword%")->with('user')->get();
  
    return response()->json( $auctions);
    



}
}
