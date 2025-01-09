<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DoctorProfile;
use Illuminate\Support\Facades\Auth;

class DoctorsController extends Controller
{
    public function index(){

        return view('Doctor.dashboard');
    }

    public function profile(){

       $profile = DoctorProfile::where('user_id',Auth::user()->id)->first();
 
        return view('Doctor.profile',compact('profile'));
    }

    public function Editprofile(){

        return view('Doctor.edit');
    }
}
