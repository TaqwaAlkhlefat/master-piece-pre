<?php

namespace App\Http\Controllers;
use App\Models\Appointment;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showappointment()
    {
        $data=appointment::all();

        return view('doctor.showappointment',compact('data'));
    }

    public function approved($id)
    {
        $data=appointment::find($id);

        $data->status='approved';

        $data->save();

        return redirect()->back();
    }

    public function canceled($id)
    {
        $data=appointment::find($id);

        $data->status='canceld';

        $data->save();

        return redirect()->back();
    }
}
