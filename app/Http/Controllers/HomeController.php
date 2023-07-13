<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Appointment;


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
                // return view('doctor.home');

                $id = auth()->user()->id;

                $doctor = User::where('id', $id)->get();

                $admin_approval= User::where('admin_approval',$id)->get();

                return view('doctor.home',compact('doctor'));


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
        $doctor = user::where('usertype', 3)->get();
        return view('user.appointment',compact('doctor'));
    }

    public function store()
    {
        return view('user.dentline');
    }

    public function cont()
    {
        return view('user.contact');
    }

    public function appointmentt(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to book an appointment.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'number' => 'required',
            'doctor' => 'required',
        ]);

        $data = new appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->phone = $request->number;
        $data->message=$request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';

        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appointment Request Successful. We will contact you soon.');
    }


    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;

            $appoint=appointment::where('user_id',$userid)->get();

            return view('user.my_appoinment',compact('appoint'));
        }
        else{
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data=appointment::find($id);

        $data->delete();

        return redirect()->back();
    }

}
