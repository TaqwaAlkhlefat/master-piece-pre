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

    // public function acceptDoctor(Request $request)
    // {
    //     $doctorId = $request->input('doctor_id');

    //     // Update the "admin_approval" value for the doctor with the provided ID
    //     $doctor = User::find($doctorId);
    //     if ($doctor) {
    //         $doctor->admin_approval = 1;
    //         $doctor->save();

    //         // Return a successful response
    //         return response()->json(['message' => 'Doctor accepted successfully'], 200);
    //     }

    //     // Return an error response
    //     return response()->json(['message' => 'Doctor not found'], 404);
    // }



    public function index()
    {
        $doctor = user::where('usertype', 3)->get();
        return view('admin.accept_doctor',compact('doctor'));
    }



    // public function upload(Request $request)
    // {
    //     $doctor = User::where('usertype', 3)->get();

    //     return redirect()->route('admin.accept_doctor')->with('success', 'Doctor accepted successfully');
    // }

    public function acceptDoctor($id)
    {
        $data=User::find($id);

        $data->admin_approval='1';

        $data->save();

        return redirect()->back();
    }


}
