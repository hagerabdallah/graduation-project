<?php

namespace App\Http\Controllers\user;
  use App\Models\Auction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



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


}
