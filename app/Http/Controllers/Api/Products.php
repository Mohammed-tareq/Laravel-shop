<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandsResource;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\SubcategoriesResource;
use App\Http\Resources\ProductsResource;
use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class Products extends Controller
{
    
    public function categories(){
        $categories = Category::all();
        return CategoriesResource::collection($categories);
    }

    public function subcategories(){

        $subcategories = Subcategory::with('category')->get();    
        return SubcategoriesResource::collection($subcategories);
    }

    public function brands(){
        $brands = Brands::with('category')->get();
        return BrandsResource::collection($brands);
    }


    public function products(){

        $products = Product::with('category','subcategory' ,'brand')->get();    
        return ProductsResource::collection($products);
    }


    public function singleProduct($id){

        $product = Product::with('category','subcategory' ,'brand')->find($id);

        return  ProductsResource::make($product) ;
    }
}
