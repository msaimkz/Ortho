<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){

        return view('Admin.Patients.patients');
    }

    public function profile(){

        return view('Admin.Patients.profile');
    }
}
