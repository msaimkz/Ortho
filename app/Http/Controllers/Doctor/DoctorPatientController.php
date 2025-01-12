<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Patient\PatientProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorPatientController extends Controller
{
    public function index(){


        $patients = Appoinment::where('doctor_id', Auth::user()->id)
        ->with('patient')
        ->latest()
        ->get()
        ->unique('patient_id');
        return view('Doctor.Patient.patient',compact('patients'));
    }

    public function profile(string $id){

        $patient = User::find($id);
        $profile = PatientProfile::where('user_id',$id)->first();

        if($patient == null){

            return redirect()->route('doctor.notfound');
        }

        return view('Doctor.Patient.profile',compact('patient','profile'));
    }
}
