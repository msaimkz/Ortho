<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient\PatientProfile;
use App\Models\User;

class PatientController extends Controller
{
    public function index(){

        $patients = User::where('role','patients')->get();

        return view('Admin.Patients.patients',compact('patients'));
    }

    public function profile(string $id){

        $patient = User::find($id);
        $profile = PatientProfile::where('user_id',$id)->first();

        return view('Admin.Patients.profile',compact('patient','profile'));
    }

    public function status(string $id){
        
        $patient = User::find($id);

        if($patient == null){
            return response()->json([
                'status' => false,        
                'error' => 'Patient Not Found',
            ]);
        }

        if($patient->status == 'active'){

            $patient->status = 'block';
            $patient->update();

            return response()->json([
                'status' => true,
                'patientStatus' => $patient->status,
                'msg' => ucwords($patient->name).' Status Change Successfully',
            ]);
        }
        else{
            $patient->status = 'active';
            $patient->update();

            return response()->json([
                'status' => true,
                'patientStatus' => $patient->status,
                'msg' => $patient->name.'Status Change Successfully',
            ]);
        }
    }
}
