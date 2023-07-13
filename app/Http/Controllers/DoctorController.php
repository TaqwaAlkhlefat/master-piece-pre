<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function showappointment()
    {
        $doctorName = auth()->user()->name; // Assuming the user's name is stored in the 'name' field

        $data = appointment::where('doctor', $doctorName)->get();

        return view('doctor.showappointment', compact('data'));
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

    public function emailview($id)
    {
        return view('doctor.email_view');
    }

public function changeinformation(Request $request)
{
    $userData = $request->session()->get('user_data');

        // Retrieve the user's data from the session
        // $Data = $request->session()->get('data');

        // Pass the user data to the view
        // return view('edit-doctor', compact('userData'));

    // $data = session('user_data'); // Assuming 'user_data' is the key where user data is stored in the session

    return view('doctor.changeinformation', compact('userData'));
}

    public function editdoctor(Request $request)
    {


        $user = Auth::user()->id;

        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->specialization=$request->specialization;
        $user->experience=$request->experience;
        $user->medical_license=$request->medical_license;
        $user->certification_documents=$request->certification_documents;
        $user->educational_certificates=$request->educational_certificates;
        $user->professional_affiliation_proof=$request->professional_affiliation_proof;
        $user->continuing_education_certificates=$request->continuing_education_certificates;

        $image=$request->file;

        if($image)
        {


        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);

        $user->image= $imagename;
        }

        $user->save();

        return redirect()->back()->with('message','Updated Successfully');


    }

//     public function updateInformation(Request $request)
// {
    // Retrieve the updated user data from the request
    // $updatedUserData = $request->only('name', 'email');

    // Update the user data in the session
    // session(['user' => $updatedUserData]);

    // Redirect back to the change information page or any other desired page
    // return redirect()->back()->with('success', 'User information updated successfully.');
// }

// public function edit(Request $request)
// {
//     // Retrieve the user's data from the session
//     $userData = $request->session()->get('user_data');

//     // Pass the user data to the view
//     return view('edit-doctor', compact('userData'));
// }

// public function update(Request $request)
// {
//     // Validate the form data
//     $validatedData = $request->validate([
//         'name' => 'required',
//         'phone' => 'required',
//         'address' => 'required',
//         'specialization' => 'required',
//         'experience' => 'required',
//         // Add validation rules for other fields if necessary
//     ]);

//     // Update the user's data in the session
//     $request->session()->put('user_data', $validatedData);

//     // Redirect the user to a success page or perform other actions
//     return redirect()->route('success');
// }

}
