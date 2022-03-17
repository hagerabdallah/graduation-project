<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\AdsController;
use App\Http\Controllers\admin\ClientsController;
use App\Http\Controllers\user\AdvertismentController;


use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\user\AuctionController;
use App\Models\Advertisment;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
####################################Categories###############################




 
Route::get('/', function () {
    return view('welcome');
});
################################################user#########################################
Auth::routes();

Route::prefix('user')->name('user.')->group(function () {
      //guestuser
      Route::middleware(['guest','preventBackHistory'])->group(function () {
      Route::view('/login', 'dashboard.user.login')->name('login');
      Route::view('/register', 'dashboard.user.register')->name('register');
      Route::post('/create', [UserController::class,'create'])->name('create');
      Route::post('/check', [UserController::class,'check'])->name('check');
    //end guest user
      
      
      });
      //auth user
      Route::middleware(['auth','preventBackHistory'])->group(function () {
      Route::view('/home', 'dashboard.user.home')->name('home');  
      Route::post('/logout', [UserController::class,'logout'])->name('logout');
      //end auth
      // Advertisment CRUD
      Route::get('/advertisment/create',[AdvertismentController::class,'create'])->name('advertisment.create');
      Route::Post('/advertisment/store', [AdvertismentController::class,'store'])->name('advertisment.store');
      Route::get('/advertisment/index',[AdvertismentController::class,'index'])->name('advertisment.index');
      Route::get('/advertisment/delete/{id}',[AdvertismentController::class,'delete'])->name('advertisment.delete');
      Route::get('/advertisment/edit/{id}',[AdvertismentController::class,'edit'])->name('advertisment.edit');
      Route::post('/advertisment/update/{id}',[AdvertismentController::class,'update'])->name('advertisment.update');
      Route::post('/advertisment/wishlist',[AdvertismentController::class,'addtowishlist'])->name('advertisment.addtowishlist');
      Route::get('/advertisment/show/{id}',[AdvertismentController::class,'show'])->name('advertisment.show');
      Route::get('/advertisment/favoriets',[AdvertismentController::class,'favoriets'])->name('advertisment.favoriets');
      //end advertisment CRUD
      
      //Auction CRUD
       Route::get('/auction/index', [AuctionController::class,'index'])->name('auction.index');
       Route::get('/auction/create', [AuctionController::class,'create'])->name('auction.create');
       Route::post('/auction/store',[AuctionController::class,'store'])->name('auction.store');
       Route::get('auction/edit/{id}',[AuctionController::class,'edit'])->name('auction.edit');
       Route::post('auction/update/{id}',[AuctionController::class,'update'])->name('auction.update');
       Route::get('auction/delete/{id}',[AuctionController::class,'delete'])->name('auction.delete');
       Route::get('/auction/show/{id}',[AuctionController::class,'show'])->name('auction.show');
       Route::post('/auction/join',[AuctionController::class,'join'])->name('auction.join');
       Route::get('/auction/bidders/{id}',[AuctionController::class,'bidders_info'])->name('auction.bidders_info');
      //end Auction CRUD
      //profile
      Route::get('/profile',[UserController::class,'profile'])->name('profile');
      Route::get('/profile/edit/{id}',[UserController::class,'edit'])->name('profile.edit');
      Route::post('/profile/update/{id}',[UserController::class,'update'])->name('profile.update');
      
     
      
     
      });
});
###################################################admin#################################################
Auth::routes();
Route::prefix('admin')->name('admin.')->group(function(){

  Route::middleware(['auth:admin',])->group(function(){
      Route::view('/home','dashboard.admin.home')->name('home');
      Route::post('/logout',[adminController::class,'logout'])->name('logout');
      // new
      Route::get('/advertisment/create',[AdsController::class,'create'])->name('advertisment.create');
      Route::Post('/advertisment/store', [AdsController::class,'store'])->name('advertisment.store');
      Route::get('/advertisment/index',[AdsController::class,'index'])->name('advertisment.index');
      Route::get('/advertisment/delete/{id}',[AdsController::class,'delete'])->name('advertisment.delete');
      Route::get('/advertisment/edit/{id}',[AdsController::class,'edit'])->name('advertisment.edit');
      Route::post('/advertisment/update/{id}',[AdsController::class,'update'])->name('advertisment.update');
      Route::view('client/register', 'dashboard.admin.clients.create')->name('register');
      Route::post('client/create', [ClientsController::class,'create'])->name('create');
      
      
     
      Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
      Route::get('/categories/index',[CategoriesController::class,'index'])->name('categories.index');
      Route::view('/categories/create','dashboard.admin.categories.create')->name('categories.create');
      Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
      Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
      Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
  });

 
 Route::middleware(['guest','preventBackHistory'])->group(function () {
 
    Route::view('/login', 'dashboard.admin.login')->name('login');
  
    Route::post('/check', [adminController::class,'check'])->name('check');

 });
});




