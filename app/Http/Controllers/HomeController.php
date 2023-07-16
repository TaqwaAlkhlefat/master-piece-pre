<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Appointment;

use App\Models\Votes;

use App\Models\Condidate;


class HomeController extends Controller
{
    public function getUserCount()
    {
        $userCount = User::count();

        return $userCount;
    }

    public function getDoctorCount()
    {
        $doctorCount = User::where('usertype', 3)->count();

        return $doctorCount;
    }

    public function getAppointmentCount()
    {
        $appointmentCount = Appointment::count();

        return $appointmentCount;
    }

    public function getVoteCount()
    {
        $voteCount = Votes::count();

        return $voteCount;
    }

    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = user::where('usertype', 3)->get();
                $highestPoints = Condidate::max('points');
                $candidates = Condidate::where('points', $highestPoints)->get();

                return view('user.home',compact('doctor','candidates'));
            }
            else if (Auth::user()->usertype=='1')
            {
                $userCount = $this->getUserCount();
                $doctorCount = $this->getDoctorCount();
                $appointmentCount = $this->getAppointmentCount();
                $voteCount = $this->getVoteCount();


                $user = user::All();
                $doctor = user::where('usertype', 3)->get();

                return view('admin.home',compact('userCount','doctorCount','appointmentCount','voteCount','doctor','user'));
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

        $highestPoints = Condidate::max('points');
        $candidates = Condidate::where('points', $highestPoints)->get();

        return view('user.home',compact('doctor','candidates'));
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

public function vote()
{
    $candidates = Condidate::all();
    $userId = Auth::id();

    return view('user.vote', compact('candidates', 'userId'));
}


public function addVote($id)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    // Check if vote_limit is not zero
    $users = User::findOrFail(Auth::user()->id);
    if ($users->vote_limit != 0) {
        // Increment candidate's points
        $addvote = Condidate::findOrFail($id);
        $addvote->points = $addvote->points + 1;
        $addvote->save();

        // Save the vote
        $votes = new Votes();
        $votes->user_id = Auth::user()->id;
        $votes->con_id = $id;
        $votes->save();

        // Deduct one from vote_limit
        $users->vote_limit = $users->vote_limit - 1;
        $users->voted = true;
        $users->save();

        // Check if vote_limit is now zero
        if ($users->vote_limit == 0) {
            return redirect()->back()->with('message', 'You have exhausted the number of votes allowed for this month');
        }

        return redirect()->back()->with('message', 'The vote was successful');
    }

    return redirect()->back()->with('message', 'You have already used all your votes for this month');
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


// public function ourdoctor()
// {

// }

public function ourdoctor(Request $request)
{
    $query = User::where('usertype', 3); // Base query for doctors

    // Filter by name
    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    // Filter by address
    if ($request->has('address')) {
        $query->where('address', 'like', '%' . $request->input('address') . '%');
    }

    // Filter by price
    if ($request->has('price')) {
        $query->where('session_price', $request->input('price'));
    }

    // Filter by specialization
    if ($request->has('specialization')) {
        $query->where('specialization', 'like', '%' . $request->input('specialization') . '%');
    }

    $doctor = $query->get();

    // Get all doctors when no filters are applied
    $allDoctor = User::where('usertype', 3)->get();

    return view('user.ourdoctor', compact('doctor', 'allDoctor'));
}





}
