<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }



    public function adminlogin()
    {
        return view('admin.login');
    }

    public function adminregister()
    {
        return view('admin.register');
    }




    public function makeadminregister(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required| unique:admins,email",
            "password"=>"required |min:8 |confirmed",
        ]);

        $input = $request->except('password');
        $input['password']= Hash::make($request->password);

        Admin::create($input);

        return redirect()->route('adminlogin');

    }



    public function makeadminlogin(Request $request)
    {
        $request->validate([

            "email"=>"required",
            "password"=>"required |min:8 ",
        ]);

        $input = $request->only('email','password');

        if(Auth::guard('admin')->attempt($input)){
            return redirect()->route('adminhome');
        }
        return redirect()->route('adminlogin');

    }



    public function adminlogout(){

        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin');
    }



}

