<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $subcategories = Subcategory::with('category')->latest();
        $category = Category::all();
    // Check if a keyword is provided
    if (!empty($request->get('keyword'))) {
        // Apply search by name and sort by `id` in ascending order
        $subcategories = $subcategories->where('name', 'like',  $request->get('keyword') )->orderBy('id', 'asc');

    }

    // Paginate the results
    $subcategories = $subcategories->orderBy('id', 'asc')->paginate(10);

        return view('admin.subcategory.subcategory', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $status = ['active','closed'];
        return view('admin.subcategory.addsubcategory', compact('categories', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required | unique:subcategories,name',
            'slug'=>'required | unique:subcategories,slug',
            'category_id'=>'required',
            'image'=>'required'
        ]);

        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }

        Subcategory::create($input);
        return redirect()->route('subcategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $subcategory=Subcategory::find($id);
        $status = ['active','closed'];
        $categories = Category::all();
        return view('admin.subcategory.editsubcategory', compact('subcategory','status', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'name'=>'required',
           'slug'=>'required',
           'category_id'=>'required',
           'status'=>'required',
           
        ]);

        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }

        $subcategory = Subcategory::find($id);
        $subcategory->update($input);
        return redirect()->route('subcategory.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subcategory::find($id)->delete();

        return back();
    }
}
