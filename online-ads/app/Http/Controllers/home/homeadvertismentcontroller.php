<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\category;
use Illuminate\Http\Request;

class homeadvertismentcontroller extends Controller
{
    public function index(){
      $Advertisment=Advertisment::where('is_active','1')->where('is_accepted','1')->get();
      $category=category::get();

      return view('home.advertisment.allAds',compact('Advertisment','category'));   
    }
}
