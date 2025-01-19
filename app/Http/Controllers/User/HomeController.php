<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use App\Models\Admin\Faq;
use App\Models\Admin\Service;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\CourseComment;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorComment;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $doctors = DoctorProfile::where('status', 'active')->where('DoctorStatus', 'active')->limit(5)->get();

        $blogs = Blog::where('status', 'active')->where('IsHome', 'yes')->get();

        $services = Service::where('status', 'active')->where('IsHome', 'yes')->get();
        $bestServices = Service::where('status', 'active')->limit(4)->get();

        $courses = Course::where('status', 'active')->where('IsHome', 'yes')->get();


        return view('User.index', compact('doctors', 'blogs', 'services', 'bestServices', 'courses'));
    }


    public function about()
    {

        $doctors = DoctorProfile::where('status', 'active')->where('DoctorStatus', 'active')->get();


        return view('User.about', compact('doctors'));
    }


    public function contact()
    {

        return view('User.contact');
    }

    public function service()
    {

        $services = Service::where('status', 'active')->get();


        return view('User.servive', compact('services'));
    }

    public function serviceDetail(string $slug)
    {

        $service = Service::where('slug', $slug)->first();
        $serviceLists = Service::where('status', 'active')->limit(5)->get();
        $BestServices = Service::where('status', 'active')->latest()->limit(2)->get();

        if ($service == null) {

            return redirect()->route('User.error');
        }

        return view('User.service-detail', compact('service', 'BestServices', 'serviceLists'));
    }

    public function blogDetail(string $slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        $RecentBlogs = Blog::where('status', 'active')->latest()->limit(3)->get();

        $blogComment = BlogComment::where('blog_id', $blog->id)->where('status', 'active')->with('user')->get();


        $blog->increment('IsRead');

        if ($blog == null) {

            return redirect()->route('User.error');
        }

        return view('User.blog-detail', compact('blog', 'RecentBlogs', 'blogComment'));
    }

    public function blog()
    {

        $blogs = Blog::where('status', 'active')->get();

        return view('User.blog', compact('blogs'));
    }

    public function doctor()
    {

        $doctors = DoctorProfile::where('status', 'active')->where('DoctorStatus', 'active')->get();


        return view('User.doctor', compact('doctors'));
    }

    public function doctorDetail(string $id)
    {

        $doctor = DoctorProfile::where('user_id', $id)->where('status', 'active')->where('DoctorStatus', 'active')->first();

        if ($doctor == null) {

            return redirect()->route('User.error');
        }
        $workingTimes = DoctorWorkingTime::where('doctor_id', $doctor->user_id)->where('status', 'active')->get();
        $doctorComments = DoctorComment::where('doctor_id', $doctor->user_id)->where('status', 'active')->latest()->with('user')->get();
        return view('User.doctor-detail', compact('doctor', 'workingTimes','doctorComments'));
    }

    public function project()
    {

        $courses = Course::where('status', 'active')->get();

        return view('User.project', compact('courses'));
    }

    public function CourseDetail(string $slug)
    {

        $course = Course::where('slug', $slug)->first();
        $RecentCourses = Course::where('status', 'active')->latest()->limit(3)->get();
        $CourseComment = CourseComment::where('course', $course->id)->where('status', 'active')->with('user')->get();

        if ($course == null) {

            return redirect()->route('User.error');
        }

        return view('User.CourseDetail', compact('course', 'RecentCourses', 'CourseComment'));
    }

    public function timetable()
    {

        $workingTimes = DoctorWorkingTime::all()->sortBy('start_time')->groupBy(function ($schedule) {
            return $schedule->start_time; // Group by start_time
        });

        return view('User.timetable', compact('workingTimes'));
    }
    public function error()
    {

        return view('User.error');
    }

    public function apoinment(string $id)
    {

        if (Auth::check() == false) {

            if (!session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);
            }

            return redirect()->route('login');
        }

        session()->forget('url.intended');

        $doctor = DoctorProfile::find($id);

        if ($doctor == null) {

            return redirect()->route('User.error');
        }

        $workingTimes = DoctorWorkingTime::where('doctor_id', $doctor->user_id)->where('status', 'active')->get();

        return view('User.apoinment', compact('doctor', 'workingTimes'));
    }

    public function DoctorRegistration()
    {

        if (Auth::check() == false) {

            if (!session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);
            }

            return redirect()->route('login');
        }

        session()->forget('url.intended');

        return view('User.doctor-regiestraion');
    }

    public function faq()
    {

        $faqs = Faq::where('status', 'visible')->get();

        return view('User.faq', compact('faqs'));
    }

    public function privacy()
    {

        return view('User.privacy');
    }
}
