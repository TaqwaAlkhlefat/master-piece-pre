<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = user::where('usertype', 3)->get();

                return view('user.home',compact('doctor'));
            }
            else if (Auth::user()->usertype=='1')
            {
                $doctor = user::where('usertype', 3)->get();
                return view('admin.home',compact('doctor'));
            }
            else
            {
                return view('doctor.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }

        else
        {
        $doctor = user::where('usertype', 3)->get();

        return view('user.home',compact('doctor'));
        }
    }

    public function show()
    {
        return view('user.appointment');
    }

    public function store()
    {
        return view('user.dentline');
    }

    public function cont()
    {
        return view('user.contact');
    }

}
