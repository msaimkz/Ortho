<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('User.index');
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

    public function doctorDetail(){

        return view('User.doctor-detail');
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

    public function apoinment(){

        return view('User.apoinment');
    }

    public function DoctorRegistration(){

        return view('User.doctor-regiestraion');
    }
}
