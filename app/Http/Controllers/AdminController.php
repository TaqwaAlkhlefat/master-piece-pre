<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function acceptview()
    {
        $doctor = user::where('usertype', 3)->get();
        return view('admin.accept_doctor',compact('doctor'));
    }


    public function index()
    {
        $doctor = user::where('usertype', 3)->get();
        return view('admin.accept_doctor.index',compact('doctor'));
    }

    // public function index()
    // {



    //     return view('admin.productdashboard.index', compact('products','categories'));
    // }


    public function edit($id)
    {
        $doctor = user::where('usertype', 3)->get();
        return view('users.edit',compact('doctor'));
    }

    public function upload(Request $request, $id)
    {
        $doctor = user::where('usertype', 3)->get();


        return redirect()->route('admin.accept_doctor',compact('doctor'))->with('success', 'Doctor Accepted successfully');
    }

}
