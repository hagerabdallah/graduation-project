<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auction;
use Image;

class ClientauctionController extends Controller
{
    //
    public function index()
    {
        $data['auction']=Auction::where('is_accepted','0')->get();
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
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'img'=>'required|image|mimes:jpg,png,jpeg',
            'min_price'=>'required|numeric',
            'condition'=>'required',
            'user_id'=>'required',
         ]);
         $new_name=$request->img->hashName();
         Image::make($request->img)->resize(50,50)->save(public_path('Uploads/auctions/'.$new_name));

            Auction::create([
                'user_id' => $request->user_id,
                'name'=>$request->name,
                'desc'=>$request->desc,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'img'=>$new_name,
                'min_price'=>$request->min_price,
                'condition'=>$request->condition       
         
            ]);
        return view('dashboard.admin.home');
       
    }
    public function edit($id)
    {
        $data['users']= User::select('id','email')->get();
        $data['auction']= Auction::findOrfail($id);
        return view('dashboard.admin.auctions.edit')->with($data);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'=>'required|string|max:50',
            'desc'=>'required|string|max:100',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'img'=>'required',
            'min_price'=>'required|numeric',
            'condition'=>'required',
            'user_id'=>'required',
         ]);
    
         Auction::findOrfail($id)->update([
            'user_id' => $request->user_id,
            'name'=>$request->name,
            'desc'=>$request->desc,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'img'=>$request->img,
            'min_price'=>$request->min_price,
            'condition'=>$request->condition 
    
         ]);
    
       return back();
    }
    public function delete($id)
    {
        Auction::findOrfail($id)->delete();
        return back();
    }
}
