<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontController;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',function () {
    return view('layouts.admin');
}
);
//Proudcts routes
Route::get('/admin/products',[ProductController::class,'index'])->name('admin.products.index');
Route::get('/admin/products/create',[ProductController::class,'create'])->name('admin.products.create');
Route::post('/admin/products',[ProductController::class,'store'])->name('admin.products.store');
Route::get('/admin/products/{product}/edit',[ProductController::class,'edit'])->name('admin.products.edit');
Route::put('/admin/products/{product}',[ProductController::class,'update'])->name('admin.products.update');
Route::delete('admin/products/{product}',[ProductController::class,'destroy'])->name('admin.products.destroy');

//Categories routes
Route::get('/admin/categories',[CategoryController::class,'index'])->name('admin.categories.index');
Route::get('/admin/categories/create',[CategoryController::class,'create'])->name('admin.categories.create');
Route::post('/admin/categories',[CategoryController::class,'store'])->name('admin.categories.store');
Route::get('/admin/categories/{category}/edit',[CategoryController::class,'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{category}',[CategoryController::class,'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{category}',[CategoryController::class,'destroy'])->name('admin.categories.destroy');

//frontend routes
Route::get('home',[FrontController::class,'index'])->name('home.index');
