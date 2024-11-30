<?php

use App\Http\Controllers\Api\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test',function(){
    return "test work";
});

Route::get('/categories' , [Products::class , 'categories']);
Route::get('/subcategories' , [Products::class , 'subcategories']);
Route::get('/brands' , [Products::class , 'brands']);
Route::get('/products' , [Products::class , 'products']);


Route::get('/product/{id}' , [Products::class , 'singleProduct']);

