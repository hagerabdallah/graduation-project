<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Auction;
use App\Models\Advertisment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $Advertisment=Advertisment::orderBy('id','Desc')->take(6)->get();
        // dd($Advertisment);
        $Auction=Auction::where('start_date','>=',Carbon::now())->where('is_active','1')->where('is_accepted','1')->orderBy('id','Desc')->take(2)->get();
        return view('home.mainhome',compact('Advertisment','Auction'));
    }

    // public function getAds(){

    //     $Advertisment=Advertisment::orderBy()->get();
    //     dd($Advertisment);
    //     return view ('home.mainhome')->with('Advertisment');

    // }
    // public function getAuca(){

    //     $Auction=Auction::orderBy()->get();
    //     dd($Auction);
    //     return view ('home.mainhome')->with('Auction');

    // }

}
