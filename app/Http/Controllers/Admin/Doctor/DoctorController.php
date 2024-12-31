<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function doctor(){

        return view('Admin.Doctor.doctor');
    }

    public function profile(){

        return view('Admin.Doctor.doctor-profile');
    }

    public function request(){

        return view('Admin.Doctor.request');
    }

    public function requestProfile(){

        return view('Admin.Doctor.request-profile');
    }
}
