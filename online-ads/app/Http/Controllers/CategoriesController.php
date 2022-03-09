<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $categories=category::get();
        return view ('dashboard.admin.categories.index',compact('categories'));
    }
  
    public function store(request $request)
    {
        
            $request->validate(
                [
                    'name'=>'required|string|min:2|max:50',
                    'desc'=>'required|string|min:2|max:100',
                ]
                );
               $categories= category::create([
                    'name' => $request->name,
                    'desc'=>$request->desc,
                ]);

                  if( $categories)
                  {
                    return back()->with('success','category created successfully');
                  }

                 return back()->with('fail','Something went wrong, failed to create');



    }
    public function edit($id)
    {
        $categories=category::findOrfail($id);
        return view ('dashboard.admin.categories.edit',compact('categories'));
    }
    public function update (request $request,$id)
    {
        $request->validate([
            'name'=>'required|string|min:2|max:50',
            'desc'=>'required|string|min:2|max:100',
        ]);
        $categories=category::findOrfail($id)->update([
            'name' => $request->name,
            'desc'=>$request->desc,  ]
        );
        if( $categories)
                  {
                    return back()->with('success','category updated successfully');
                  }

                 return back()->with('fail','Something went wrong, failed to update');

    }
    public function delete ($id)
    {
        $categories=category::findOrfail($id);
        $categories->delete();
        return back();
    }
}
