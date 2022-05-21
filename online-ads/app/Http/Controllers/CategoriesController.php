<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\category;
use App\Models\Advertisment;
use App\Models\imege;
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
                if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);
    
            if (!$request->has('is_accepted'))
                $request->request->add(['is_accepted' => 0]);
            else
                $request->request->add(['is_accepted' => 1]);
               $categories= category::create([
                    'name' => $request->name,
                    'desc'=>$request->desc,
                    'is_accepted' => $request->is_accepted,
                    'is_active' => $request->is_active
                ]);
   return back();
                //   if( $categories)
                //   {
                //     return back()->with('success','category created successfully');
                //   }

                //  return back()->with('fail','Something went wrong, failed to create');



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
        
        $ads=Advertisment::where('category_id',$id)->get();
        foreach ($ads as $ad) {
           
           
            // cover
            unlink(public_path('Uploads/Advertisments/').$ad->img);
            
            // sub
            $old_names =Imege::where('advertisment_id',  $ad->id)->get();
            foreach ($old_names as $oldd) {
                unlink(public_path('Uploads/Advertisments/').$oldd->image);
                Imege::where('advertisment_id', $ad->id)->delete();
            }
            Advertisment::where('id',$ad->id)->delete();
                
            }
          
        $categories=category::findOrfail($id);
        $categories->delete();
      
        
        return back();
    }
    public function search( Request $request)
    {
        $keyword=$request->keyword;
        $categories=Category::where('name','like',"%$keyword%")->get();
      
        return response()->json( $categories);
        
    
    
    
    }
}
