<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController as Products;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdsController;



Route::get('/product',[Products::class,'index'])->name('index');
Route::get('/',[Products::class,'home'])->name('home');
Route::post('/search',[Products::class,'home'])->name('search');
Route::get('/category/search/{id}',[Products::class,'search'])->name('searchWithCategory');
Route::get('/showproduct/{id}',[Products::class,'showProduct'])->name('showproduct');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/logout', [DashboardController::class,'logout'])->name('logout.user');

    //hi

     // Cutomer orders 
     Route::get('/orders/user', [OrderController::class, 'index'])->name('orders.user.index');
     Route::get('/orders/items/{id}', [OrderController::class, 'show'])->name('order.user.items');
     Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.user.create');
     Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');
     Route::post('/order/checkout', [OrderController::class, 'store'])->name('order.checkout');
});

Route::prefix('dashboard')->group(function () {
    
    Route::get('/category/all',[CategoryController::class,'index'])->name('category');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/sub/{id}',[CategoryController::class,'show'])->name('category.sub');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::any('/category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');


    // Products Route
    Route::get('/product/all',[ProductController::class,'index'])->name('product');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/sub/{id}',[ProductController::class,'show'])->name('product.sub');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::any('/product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
});

    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
   
   

    
    // Admin Order proccess
    Route::get('/orders/admin', [OrderController::class, 'indexAdmin'])->name('orders.admin.index');
    Route::get('/orders/status/{id}', [OrderController::class, 'edit'])->name('orders.admin.edit');
    Route::post('/status/update/{id}', [OrderController::class, 'update'])->name('orders.admin.update');
    Route::get('/admin/items/{id}', [OrderController::class, 'showAdmin'])->name('order.admin.items');

   
   
    Route::get('/ads/all',[AdsController::class,'index'])->name('ads');
    Route::get('/ads/create',[AdsController::class,'create'])->name('ads.create');
    Route::post('/ads/store',[AdsController::class,'store'])->name('ads.store');
    Route::get('/ads/sub/{id}',[AdsController::class,'show'])->name('ads.sub');
    Route::get('/ads/edit/{id}',[AdsController::class,'edit'])->name('ads.edit');
    Route::post('/ads/update/{id}',[AdsController::class,'update'])->name('ads.update');
    Route::get('/ads/delete/{id}',[AdsController::class,'delete'])->name('ads.delete');
    Route::any('/ads/destroy/{id}',[AdsController::class,'destroy'])->name('ads.destroy');


    Route::get('/test', function () {
        return view('test');
    });