<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $doctors = DoctorProfile::where('status','active')->where('DoctorStatus','active')->get();

        $blogs = Blog::where('status','active')->where('IsHome','yes')->get();

        return view('User.index',compact('doctors','blogs'));
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

    public function blogDetail(string $slug){

        $blog = Blog::where('slug',$slug)->first();

        $RecentBlogs = Blog::where('status','active')->latest()->limit(3)->get();

        if($blog == null){

            return redirect()->route('User.error');
        }

        return view('User.blog-detail',compact('blog','RecentBlogs'));
    }

    public function blog(){

        $blogs = Blog::where('status','active')->get();

        return view('User.blog',compact('blogs'));
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
