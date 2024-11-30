<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brands = Brands::with('category')->latest();


        if(!empty($request->get('keyword'))){
            $brands = $brands->where('name','like', $request->get('keyword') );
        }


        $brands = $brands->orderBy('id', 'asc')->paginate(10);


        return view('admin.brands.brands',compact('brands'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $brand_status = ['active','closed'];
        return view('admin.brands.addbrand' , compact('brand_status','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required | unique:categories,name',
            'slug'=>'required',
            'image'=>'required'
        ]);

        $input = $request->all();

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }
        Brands::create($input);
        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand =Brands::find($id);
        $categories = Category::all();
        $status = ['active','closed'];

        return view('admin.brands.edit', compact('brand','status','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

            $request->validate([
                'name'=>'required',
                'slug'=>'required'
            ]);

            $input = $request->except('image');

            if($request->hasFile('image')){

                $image = $request->file('image');
                $path = $image->getClientOriginalExtension();
                $imagename = uniqid() .".". $path;
                $image->move(public_path('images/'), $imagename);
                $input['image'] = asset('images/' . $imagename);
            }

            $brand = Brands::find($id);
            $brand->update($input);

            return redirect()->route('brand.index');
    }


    public function destroy($id)
    {
        Brands::find($id)->delete();

        return back();
    }
}

