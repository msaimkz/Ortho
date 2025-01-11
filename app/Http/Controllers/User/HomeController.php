<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $doctors = DoctorProfile::where('status','active')->where('DoctorStatus','active')->get();

        return view('User.index',compact('doctors'));
    }


    public function about(){

        return view('User.about');
    }


    public function contact(){

        return view('User.contact');
    }

    public function service(){

        return view('User.servive');
    }

    public function serviceDetail(){

        return view('User.service-detail');
    }

    public function blogDetail(){

        return view('User.blog-detail');
    }

    public function blog(){

        return view('User.blog');
    }

    public function doctor(){

        return view('User.doctor');
    }

    public function doctorDetail(string $id){

        $doctor = DoctorProfile::find($id);

        if($doctor == null){

            return redirect()->route('User.error');
        }
        $workingTimes = DoctorWorkingTime::where('doctor_id',$doctor->user_id)->where('status','active')->get();
        return view('User.doctor-detail',compact('doctor','workingTimes'));
    }

    public function project(){

        return view('User.project');
    }

    public function timetable(){

        return view('User.timetable');
    }
    public function error(){

        return view('User.error');
    }

    public function apoinment(string $id){

        if(Auth::check() == false){

            return redirect()->route('login');
        }

        $doctor = DoctorProfile::find($id);

        if($doctor == null){

            return redirect()->route('User.error');
        }

        $workingTimes = DoctorWorkingTime::where('doctor_id',$doctor->user_id)->where('status','active')->get();
     
        return view('User.apoinment',compact('doctor','workingTimes'));
    }

    public function DoctorRegistration(){

        if(Auth::check() == false){

            return redirect()->route('login');
        }

        return view('User.doctor-regiestraion');
    }
}
