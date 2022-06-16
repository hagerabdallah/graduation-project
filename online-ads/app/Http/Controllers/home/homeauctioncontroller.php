<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use Illuminate\Http\Request;

class homeauctioncontroller extends Controller
{
    public function index(){
        $Auction=Auction::where('is_active','1')->where('is_accepted','1')->get();  
        return view('home.auctions.allauctions',compact('Auction'));   
      }
}
