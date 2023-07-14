<?php

namespace App\Http\Controllers;
use App\Models\Condidate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function acceptview()
    {
        $doctor = user::where('usertype', 3)->get();

        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.accept_doctor',compact('doctor'));
            }
            else{
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function condidateview()
    {
        $candidate = Condidate::All();

        return view('admin.condidate',compact('candidate'));
    }

    public function upload_condidate(Request $request)
    {

        $candidate=new Condidate;

        $image=$request->image;

        $imagename=time().'.'.$image->getClientoriginalExtension();

        $request->image->move('doctorimage',$imagename);

        $candidate->image=$imagename;

        $candidate->fname=$request->fname;

        $candidate->lname=$request->lname;

        $candidate->email=$request->email;

        $candidate->pos_id=$request->pos_id;

        $candidate->points=$request->points;


        $candidate->save();

        return redirect()->back()->with('message','Candidate Added Successfully');

    }

    public function deletcandidate($id)
    {
        $data=Condidate::find($id);

        $data->delete();

        return redirect()->back();
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

    public function deletDoctor($id)
    {
        $data=User::find($id);

        $data->delete();

        return redirect()->back();
    }


}
