<?php

namespace App\Http\Controllers\user;
  use App\Models\Auction;
use App\Http\Controllers\Controller;
use App\Models\auctiontable;
use App\Models\Price;
USE Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class AuctionController extends Controller
{

public function index(){
    $auction=Auction::where('user_id', auth()->id())->where('is_accepted','0')->get();
    return view('dashboard.user.auction.index',compact('auction'));
}

    public function create(){

        return view('dashboard.user.auction.create');
    }

    public function store(Request $request){
    
   $request->validate([
   'name'=>'required|string|max:50',
   'desc'=>'required|string|max:100',
   'start_date'=>'required|date',
   'end_date'=>'required|date',
   'img'=>'required|image|mimes:jpg,png,jpeg',
   'min_price'=>'required|numeric',
   'condition'=>'required'
]);

$newname=$request->img->hashName();
Image::make($request->img)->resize(50,50)->save(public_path('Uploads/auctions/'.$newname));
$request->img=$newname;
   $newauction=Auction::create([
       'user_id'=>Auth()->id(),
       'name'=>$request->name,
       'desc'=>$request->desc,
       'start_date'=>$request->start_date,
       'end_date'=>$request->end_date,
       'img'=>$request->img,
       'min_price'=>$request->min_price,
       'condition'=>$request->condition       

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

   return view('dashboard.user.home');
}

public function edit($id){
  $auction= Auction::findOrfail($id);
  $images=auctiontable::where('auction_id',$id)->get();

   return view('dashboard.user.auction.edit',compact('auction','images'));
}
public function update(Request $request,$id){

    $request->validate([
        'name'=>'required|string|max:50',
        'desc'=>'required|string|max:100',
        'start_date'=>'required|date',
        'end_date'=>'required|date',
        'img'=>'nullable|image|mimes:jpg,png,jpeg',
        'min_price'=>'required|numeric',
        'condition'=>'required'
     ]);
     $old_name=Auction::findOrfail($request->id)->img;
     if($request->hasFile('img')){
        Storage::disk('Uploads')->delete('Auctions/'.$old_name);
        $new_name=$request->img->hashName();
        Image::make($request->img)->resize(50,50)->save(public_path('Uploads/Auctions/'.$new_name));
        $request->img=$new_name;
   }else{
       $request->img= $old_name;
   }
   $newauction=  Auction::findOrfail($id)->update([
        'user_id'=>Auth()->id(),
        'name'=>$request->name,
        'desc'=>$request->desc,
        'start_date'=>$request->start_date,
        'end_date'=>$request->end_date,
        'img'=>$request->img,
        'min_price'=>$request->min_price,
        'condition'=>$request->condition 

     ]);
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
    
    return back();
    
    }






public function deleteimage($id){
    $old_name=auctiontable::findOrfail($id)->image;
    unlink(public_path('Uploads/Auctions/').$old_name);
    auctiontable::findOrfail($id)->delete();
 return back();

}



        
    





////****DELETE */
public function delete($id){
    $old_name=Auction::findOrfail($id)->img;
    Storage::disk('Uploads')->delete('Auctions/'.$old_name);

    $old_names =auctiontable::where('auction_id',$id)->get();
    foreach ($old_names as $oldd) {
        unlink(public_path('Uploads/Auctions/').$oldd->image);
        auctiontable::where('auction_id',$id)->delete();
    }
 

   
   Auction::findOrfail($id)->delete();

}

//***show */
public function show ($id)
{
    $auction=Auction::findOrfail($id);
    // $price=Price::get();
   
    $count = Price::where('auction_id',$id)->count();
    
    //  dd($count);
    //  $price=Auction::where('id','auction_id')->first();
     $min_price=$auction->min_price;
     $maxprice= Price::where('auction_id',$id)->max('price');
    //  dd($maxprice);

    if ($count == 0 )
    {
     $last_price=$min_price;
   }
   else
   {
       $last_price=$maxprice;
   }
   return view ('dashboard.user.auction.show',compact('last_price','auction'));
}

public function join (Request $request)
{


    $request->validate([
      
        'price'=>'required|numeric',
        'auction_id'=>'required|exists:auctions,id'
        
     ]);
     $count = Price::where('auction_id',$request->auction_id)->count();
     //dd($count);
     $price=Auction::where('id',$request->auction_id)->first();
     $min_price=$price->min_price;
     $maxprice= Price::where('auction_id',$request->auction_id)->max('price');
    
        
        
    
       if( $request->price > $maxprice and ($request->price > $min_price))
       {
            Price::create([

            'user_id'=>Auth()->id(),
            'auction_id'=>$request->auction_id,
            'price'=>$request->price,
                  
     
        ]);

        return view('dashboard.user.home');
        }
        else{
            
            return redirect()->back();
               }
            }

               public function bidders_info($id){
                $auction=auction::findOrfail($id)->get();
                $info= Price::where('auction_id',$id)->latest()->get();

                $inf=$info->unique('user_id');
                // $users=User::where ('id',$inf->user_id)->get();
                return view ('dashboard.user.auction.bidders',compact('inf','auction'));
                
         
           }

           public function bidders_jion(){
              $joinners=Price::where('user_id',auth()->id())->get();
              return view('dashboard.user.auction.bidders_join',compact('joinners'));
           }


           public function images($id){
            $advertisment = Auction::find($id);
          
            $images=auctiontable::where('auction_id',$id)->get();
           
           return view('dashboard.user.auction.show',compact('images','advertisment'));
       }
       

}




