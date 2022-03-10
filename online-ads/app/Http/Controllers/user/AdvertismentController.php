<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\category;
use Illuminate\Http\Request;

class AdvertismentController extends Controller
{
    //index

    public function index()
    {
        $data['advertisment']=Advertisment::where('user_id', auth()->id())->get();
        $data['categories']=category::get();
        return view('dashboard.user.advertisment.index')->with($data);

    }
    


    //add advertisment
public function create()
 {
     
    $data['categories']=category::select('id','name')->get();
    return view('dashboard.user.advertisment.create')->with($data);
 }
 public function store(Request $request)
{
 $request->validate([
     'title'=>'required|string|max:10',
     'desc'=>'required|string|max:50',
     'img'=>'required',
     'price'=>'required|numeric',
     'condition'=>'required|string',
     'category_id'=>'required',
 ]);
 Advertisment::create([
    'user_id' => Auth()->id(),
    'title'=>$request->title,
    'desc'=>$request->desc,
    'price'=>$request->price,
    'condition'=>$request->condition,
     'img'=>$request->img,
     'category_id'=>$request->category_id,
 ]);
 return view('dashboard.user.home');

}
//update
public function edit($id)
{
    $data['categories']= category::select('id','name')->get();
    $data['user']=Auth()->id();
    $data['advertisment']=Advertisment::findOrfail($id);
    return view ('dashboard.user.advertisment.edit',with($data));
}
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
public function delete($id)
{
    Advertisment::findOrfail($id)->delete();
    return back();
}



}