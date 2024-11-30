<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();



Route::middleware('auth')->group(function(){

    Route::fallback(function (){if(Auth::check()){return redirect()->route('home');} return redirect()->route('login');});
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/home/shop/{category?}/{subcategory?}', [ShopController::class, 'index'])->name('user.shop');

    Route::get('/home/product/{slug}', [ShopController::class, 'singleproduct'])->name('user.singleproduct');

});




// route for all admins after check login
Route::middleware('admin')->group(function(){

    // if have any page not found go to indexpage
    // Route::fallback(fn()=> redirect('/admin'));

    // route for home page
    Route::get('/admin',[AdminController::class , 'index'])->name('adminhome');

    //route for logout by <a> tag
    Route:: get('/adminlogout',[AdminController::class, 'adminlogout'])->name('adminlogout');

    //routr for all category
    Route::resource('/category',CategoryController::class);

    //routr for all subcategory
    Route::resource('/subcategory',SubcategoryController::class);

    //routr for all Brands
    Route::resource('/brand',BrandsController::class);

    //routr for all products
    Route::resource('/product',ProductController::class);




});

//route for view to go log or register
Route::get('/adminlogin',[AdminController::class, 'adminlogin'])->name('adminlogin');
Route::get('/adminregister',[AdminController::class, 'adminregister'])->name('adminregister');


// route for upload form to database
Route::post('/makeadminregister',[AdminController::class, 'makeadminregister'])->name('makeadminregister');
Route::post('/makeadminlogin',[AdminController::class, 'makeadminlogin'])->name('makeadminlogin');



