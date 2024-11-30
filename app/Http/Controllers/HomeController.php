<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

        public function index(Request $request)
    {
        $products = Product::orderBy('id', 'desc')->take(8)->get();
        $productlatest = Product::orderBy('id', 'desc')->take(15)->get();

        $categories = Category::with('product')->where('status','active')->orderBy('id', 'desc')->take(4)->get();
        $subcategory = Subcategory::with('category')->where('status','active')->orderBy('id', 'desc')->get();
        $brends = Brands::with('category')->where('status','active')->orderBy('id', 'desc')->get();

        if(!empty($request->get('keyword'))){
            $products = $products->where('name','like', $request->get('keyword') );
        }
    


        return view('user.home' , compact('products','categories','subcategory','brends' , 'productlatest'));
    }

}
