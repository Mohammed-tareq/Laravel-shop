<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
        public function index(Request $request, $category = null, $subcategory = null)
    {
        // Fetch all active categories and brands
        $categories = Category::orderby('id', 'asc')->with('subcategory')->where('status', 'active')->take(4)->get();
        $brands = Brands::orderby('id', 'asc')->where('status', 'active')->get();

        // Start with the base query for active products
        $productsQuery = Product::query()->where('status', 'active')->orderby('id', 'desc');

        // Variables for keeping track of selected filters
        $categoryselected = '';
        $subcategoryselected = '';
        $brandArray = [];
        $priceArray = [];

        // Apply category filter if provided
        if (!empty($category)) {
            $categoryData = Category::where('name', 'like', $category)->first();

            if ($categoryData) {
                $productsQuery->where('category_id', $categoryData->id);
                $categoryselected = $categoryData->id;
            }
        }

        // Apply subcategory filter if provided
        if (!empty($subcategory)) {
            $subcategoryData = Subcategory::where('name', 'like', $subcategory)->first();

            if ($subcategoryData) {
                $productsQuery->where('subcategory_id', $subcategoryData->id);
                $subcategoryselected = $subcategoryData->id;
            }
        }

        // Apply brand filter if provided
        if ($request->has('brands') && !empty($request->get('brands'))) {
            $brandArray = explode(',', $request->get('brands'));

            if (!empty($brandArray)) {
                $productsQuery->whereIn('brand_id', $brandArray);
            }
        }


        // Apply price filter if provided
        if ($request->has('prices') && !empty($request->get('prices'))) {
            $priceArray = explode(',', $request->get('prices'));

            if (!empty($priceArray)) {
                $productsQuery->where(function ($query) use ($priceArray) {
                    foreach ($priceArray as $price) {
                        if ($price === '500-') {
                            $query->orWhere('price', '>', 500);
                        } else {
                            list($min, $max) = explode('-', $price); // Change ',' to '-'
                            $query->orWhereBetween('price', [(float) $min, (float) $max]);
                        }
                    }
                });
            }
        }


        // Get the filtered products with pagination
        $products = $productsQuery->paginate(12);
        $category = $categories->paginate(12);

        // Return the view with the filtered data
        return view('user.shop', compact('categories','category', 'brands', 'products', 'subcategoryselected', 'categoryselected', 'brandArray', 'priceArray'));
    }


    public function singleproduct($slug){
        $categories = Category::with('subcategory')->where('status','active')->get();

        $product = Product::where('slug', $slug)->first();

        if($product == null){
            abort(404);
        }

        
        return view('user.singleproduct', compact('categories','product')); 
    }

}
