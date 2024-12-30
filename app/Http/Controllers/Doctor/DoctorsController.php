<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function index(){

        return view('Doctor.dashboard');
    }

    public function profile(){

        return view('Doctor.profile');
    }
}
