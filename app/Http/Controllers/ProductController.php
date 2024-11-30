<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $products = Product::with('category','brand','subcategory');


    //     if(!empty($request->get('keyword'))){
    //         $products = $products->where('name','like', $request->get('keyword') );
    //     }



    //     $products = $products->orderBy('id', 'desc')->paginate(10);

    //     return view('admin.products.products',compact('products'));
    // }

    public function index(Request $request)
    {
        // Use the query builder to prepare the products query
        $products = Product::with('category', 'brand', 'subcategory');

        // Apply a search filter if provided
        if (!empty($request->get('keyword'))) {
            $products = $products->where('name', 'like', '%' . $request->get('keyword') . '%');
        }

        // Apply ordering and paginate the results
        $products = Product::orderBy('id', 'desc')->paginate(10); // Correct!

        // Pass paginated products to the view
        return view('admin.products.products', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brands::all();
        $status = ['active','closed'];
        $featured = ['yes','no'];
        $track = ['yes','no'];


        return view('admin.products.addproduct' , compact('status' , 'featured', 'categories', 'subcategories', 'track','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'qty' => 'required|integer',
            'isfeatured' => 'required',
            'image' => 'required',
            'subcategory_id' => 'required',
            'sku' => 'required',
            'barcode' => 'required',


        ]);



        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }

        Product::create($input);
        return redirect()->route('product.index');
    }





    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with('category','brand','subcategory')->find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brands::all();
        $status = ['active','closed'];
        $featured = ['yes','no'];
        $track = ['yes','no'];

        return view('admin.products.edit',compact('product','status','featured','track','categories','subcategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'status'=>'required',
            'qty'=>'required',
            'isfeatured'=>'required',

        ]);

        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }

        $product = Product::find($id);
        $product->update($input);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return back();
    }
}
