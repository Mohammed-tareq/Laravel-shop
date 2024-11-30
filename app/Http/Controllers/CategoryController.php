<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query();


        if(!empty($request->get('keyword'))){
            $categories = $categories->where('name','like', $request->get('keyword') );
        }


        $categories = $categories->orderBy('id', 'asc')->paginate(10);


        return view('admin.category.category',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category_status = ['active','closed'];
        return view('admin.category.addcategory' , compact('category_status'));
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
        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }

        Category::create($input);
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category=Category::find($id);
        $status = ['active','closed'];

        return view('admin.category.editcategory', compact('category','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $request->validate([
            'name'=>'required',
            'slug'=>'required',
        ]);

        $input = $request->except('image');

        if($request->hasFile('image')){

            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $imagename = uniqid() .".". $path;
            $image->move(public_path('images/'), $imagename);
            $input['image'] = asset('images/' . $imagename);
        }



        $category = Category::find($id);
        $category->update($input);

        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return back();
    }
}
