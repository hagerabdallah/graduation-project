<?php

namespace App\Http\Controllers\user;
  use App\Models\Auction;
use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;

class AuctionController extends Controller
{

public function index(){
    $auction=Auction::get();
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
   'img'=>'required',
   'min_price'=>'required|numeric',
   'condition'=>'required'
]);
   Auction::create([
       'user_id'=>Auth()->id(),
       'name'=>$request->name,
       'desc'=>$request->desc,
       'start_date'=>$request->start_date,
       'end_date'=>$request->end_date,
       'img'=>$request->img,
       'min_price'=>$request->min_price,
       'condition'=>$request->condition       

   ]);
   return view('dashboard.user.home');
}

public function edit($id){
  $auction= Auction::findOrfail($id);
   return view('dashboard.user.auction.edit',compact('auction'));
}

public function update(Request $request,$id){

    $request->validate([
        'name'=>'required|string|max:50',
        'desc'=>'required|string|max:100',
        'start_date'=>'required|date',
        'end_date'=>'required|date',
        'img'=>'required',
        'min_price'=>'required|numeric',
        'condition'=>'required'
     ]);

     Auction::findOrfail($id)->update([
        'user_id'=>Auth()->id(),
        'name'=>$request->name,
        'desc'=>$request->desc,
        'start_date'=>$request->start_date,
        'end_date'=>$request->end_date,
        'img'=>$request->img,
        'min_price'=>$request->min_price,
        'condition'=>$request->condition 

     ]);

   return view('dashboard.user.home');

}

public function delete($id){
    Auction::findOrfail($id)->delete();
}
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
            session()->flash('msg', 'Successfully done the operation.');
           
            return redirect()->back();
               }
               


    //  $min_price=Auction::where('id',$request->auction_id)->select('min_price')->first();
    //  $price=Auction::where('id',$request->auction_id)->first();
    //  $min_price=$price->min_price;
     

    //  $count = Price::where('auction_id',$request->auction_id)->count();
    //  //dd($count);
    //  if($count==0 and ($request->price>$min_price) )
    // {
    //     Price::create([

    //                 'user_id'=>Auth()->id(),
    //                 'auction_id'=>$request->auction_id,
    //                 'price'=>$request->price,
                          
             
    //             ]);
    //             return view('dashboard.user.home');

    // }
    // else
    // {
    //     return back()->with('fail','Something went wrong, failed to update');
    // }
    

    
//      $maxprice= Price::where('auction_id',$request->auction_id)->max('price');
//      if ( $request->price < $maxprice and $request->price < $min_price->min_price)
//      {
//         return back()->with('fail','Something went wrong, failed to update');
//      }
//    else{
//     Price::create([

//         'user_id'=>Auth()->id(),
//         'auction_id'=>$request->auction_id,
//         'price'=>$request->price,
              
 
//     ]);

//     return view('dashboard.user.home');
   
    //    }
    
       

}
}



