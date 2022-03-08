<?php

use App\Http\Controllers\user\usercontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\admincontroller;

use App\Http\Controllers\CategoriesController;

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

//  Route::view('/categories/create','admin.categories.create')->name('categories.create');
//  Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
//  Route::get('/categories/index',[CategoriesController::class,'index'])->name('categories.index');
//  Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
//  Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
//  Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');


 
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('user')->name('user.')->group(function () {
   
    Route::middleware(['guest','preventBackHistory'])->group(function () {
      Route::view('\login', 'dashboard.user.login')->name('login');
      Route::view('\register', 'dashboard.user.register')->name('register');
      Route::post('\create', [usercontroller::class,'create'])->name('create');
      Route::post('\check', [usercontroller::class,'check'])->name('check');

   });
    Route::middleware(['auth','preventBackHistory'])->group(function () {
      Route::view('\home', 'dashboard.user.home')->name('home');  
      Route::post('\logout', [usercontroller::class,'check'])->name('logout');
    });
});

route::prefix('admin')->name('admin.')->group(function(){

  Route::middleware(['auth','preventBackHistory'])->group(function () {
    Route::view('\login', 'dashboard.admin.login')->name('login');
    Route::post('\check', [admincontroller::class,'check'])->name('check');

 });
 Route::middleware(['guest','preventBackHistory'])->group(function () {
  Route::view('\home', 'dashboard.admin.home')->name('home');  
  Route::post('\logout', [admincontroller::class,'check'])->name('logout');

 });


});


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');