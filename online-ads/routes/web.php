<?php

use Illuminate\Support\Facades\Route;
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

 
