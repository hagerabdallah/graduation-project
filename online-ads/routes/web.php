<?php

use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\AdminController;

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

 Route::view('/categories/create','admin.categories.create')->name('categories.create');
 Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');
 Route::get('/categories/index',[CategoriesController::class,'index'])->name('categories.index');
 Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
 Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
 Route::post('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');


 
Route::get('/', function () {
    return view('welcome');
});
################################################user#########################################
Auth::routes();

Route::prefix('user')->name('user.')->group(function () {
      //guest
      Route::middleware(['guest','preventBackHistory'])->group(function () {
      Route::view('/login', 'dashboard.user.login')->name('login');
      Route::view('/register', 'dashboard.user.register')->name('register');
      Route::post('/create', [UserController::class,'create'])->name('create');
      Route::post('/check', [UserController::class,'check'])->name('check');
      });
      //auth
      Route::middleware(['auth','preventBackHistory'])->group(function () {
      Route::view('/home', 'dashboard.user.home')->name('home');  
      Route::post('/logout', [UserController::class,'logout'])->name('logout');
      });
});
###################################################admin#################################################3
Route::prefix('admin')->name('admin.')->group(function(){
       
  Route::middleware(['guest:admin',])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
  });

  Route::middleware(['auth:admin',])->group(function(){
      Route::view('/home','dashboard.admin.home')->name('home');
      Route::post('/logout',[AdminController::class,'logout'])->name('logout');
  });

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');