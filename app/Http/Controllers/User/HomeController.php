<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){

        $doctors = DoctorProfile::where('status','active')->where('DoctorStatus','active')->get();

        $blogs = Blog::where('status','active')->where('IsHome','yes')->get();

        $services = Service::where('status','active')->where('IsHome','yes')->get();
        $bestServices = Service::where('status','active')->limit(4)->get();


        return view('User.index',compact('doctors','blogs','services','bestServices'));
    }


    public function about(){

        return view('User.about');
    }


    public function contact(){

        return view('User.contact');
    }

    public function service(){

        $services = Service::where('status','active')->get();


        return view('User.servive',compact('services'));
    }

    public function serviceDetail(string $slug)
    {

        $service = Service::where('slug',$slug)->first();
        $serviceLists = Service::where('status','active')->limit(5)->get();
        $BestServices = Service::where('status','active')->latest()->limit(2)->get();

        if($service == null){

            return redirect()->route('User.error');
        }

        return view('User.service-detail',compact('service','BestServices','serviceLists'));
    }

    public function blogDetail(string $slug){

        $blog = Blog::where('slug',$slug)->first();

        $RecentBlogs = Blog::where('status','active')->latest()->limit(3)->get();

        $blogComment = BlogComment::where('blog_id',$blog->id)->where('status','active')->with('user')->get();


        $blog->increment('IsRead');

        if($blog == null){

            return redirect()->route('User.error');
        }

        return view('User.blog-detail',compact('blog','RecentBlogs','blogComment'));
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
