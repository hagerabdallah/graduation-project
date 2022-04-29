<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class AdsController extends Controller
{
    public function index(){
        $data['ads']=Advertisment::where('is_accepted','0')->get();

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
            'img'=>'required',
            'price'=>'required|numeric',
            'condition'=>'required|string',
            'category_id'=>'required',
            'user_id'=>'required',


        ]);
        Advertisment::create([
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

public function edit($id){
 
    $data['advertisment']=Advertisment::findOrfail($id);
    $data['categories']=category::select('id','name')->get();
    $data['users']=User::select('id','email')->get();
    return view ('dashboard.admin.ads.edit')->with($data);

}

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
    Advertisment::findOrfail($id)->delete();
    return back();
}


    }


