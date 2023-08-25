<?php

namespace App\Http\Controllers;
use App\Models\Condidate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function dashboardusers()
    // {
    //     // Execute the query
    //     $userCount = DB::table('users')->where('usertype', 0)->count();

    //     // Render the view with the user count
    //     return view('admin.home', compact('userCount'));
    // }

    public function acceptview(Request $request)
    {
        $query = User::where('usertype', 3);

        if (Auth::id()) {
            if (Auth::user()->usertype == 1) {
                // Check if a search query parameter is present
                if ($request->has('admin_approval')) {
                    $adminApproval = $request->input('admin_approval');

                    // Filter doctors based on admin_approval status
                    if ($adminApproval !== '') {
                        $query->where('admin_approval', $adminApproval);
                    }
                }

                $doctor = $query->get();

                return view('admin.accept_doctor', compact('doctor'));
            } else {
                return redirect()->back();
            }
        } else {
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

    // public function deletClient($id)
    // {
    //     $data = User::find($id);

    //     if ($data) {
    //         // Pass the user data to the view
    //         return view('confirm-delete', compact('data'));
    //     }

    //     return redirect()->back();
    // }

    public function deletClient($id)
    {
        $data=User::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function startNewVote(Request $request)
{
    // Clear the "votes" table
    DB::table('votes')->truncate();

    // Update the "users" table
    DB::table('users')->update(['vote_limit' => 1, 'voted' => 0]);

    DB::table('candidates')->update(['points' => 0]);

    return response()->json(['message' => 'New vote started successfully']);
}

}
