<?php

namespace App\Http\Controllers\Admin\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient\PatientProfile;
use App\Models\User;
use App\Mail\Admin\DeletePatientMail;
use App\Mail\Admin\PatientStatusMail;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    public function index(){

        $patients = User::where('role','patients')->get();

        return view('Admin.Patients.patients',compact('patients'));
    }

    public function profile(string $id){

        $patient = User::find($id);
        $profile = PatientProfile::where('user_id',$id)->first();

        if($patient == null){

            return redirect()->route('Admin.notFound');
        }

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

            Mail::to($patient->email)->send(new PatientStatusMail(
                [
                    'name' => $patient->name,
                    'status' => $patient->status,
                ]
            ));

            return response()->json([
                'status' => true,
                'patientStatus' => $patient->status,
                'msg' => ucwords($patient->name).' Status Change Successfully',
            ]);
        }
        else{
            $patient->status = 'active';
            $patient->update();

            Mail::to($patient->email)->send(new PatientStatusMail(
                [
                    'name' => $patient->name,
                    'status' => $patient->status,
                ]
            ));

            return response()->json([
                'status' => true,
                'patientStatus' => $patient->status,
                'msg' => ucwords($patient->name).' Status Change Successfully',
            ]);
        }
    }

    public function delete(string $id){

        $patient = User::find($id);
        if($patient == null){
            return response()->json([
                'status' => false,        
                'error' => 'Patient Not Found',
            ]);
        }

        Mail::to($patient->email)->send(new DeletePatientMail(
            [
                'name' => $patient->name,
                'email' => $patient->email,
                'phone' => $patient->phone,
            ]
        ));
        $patient->delete();
        return response()->json([
            'status' => true,
            'msg' => $patient->name.'Patients Record Delete  Successfully',
        ]);
    }
}
