<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidDateOfBirth;

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

    public function DoctorRegiestration(Request $request){


        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required','email','max:30','unique'],
            'phone' => ['required','regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'city' =>  ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'speciality' =>  ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'age' =>   ['required','numeric','min:11','max:89'],
            'gender' => ['required','in:male,female'],
            'date_of_birth' => ['required','date',new ValidDateOfBirth()],
            'bio' => ['required','min:10','max:250'],
            'address' => ['required','min:10','max:150'],
            'file_id' => ['required','numeric'],
            'image_id' => ['required','numeric'],
            'facebook' => ['required','regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9_]+\/?$'],
            'Instagram' => ['required','regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?$'],
            'Twitter' => ['required','regex:^(https?:\/\/)?(www\.)?twitter\.com\/[A-Za-z0-9_]+\/?$'],
         ],[
             'date_of_birth.date' => 'Date of birth must be a valid date',
             'age.min' => 'Age must be at least 11 years old',
             'age.max' => 'Age must be less than or equal to 89 years',
             'age.numeric' => 'Please enter a valid age',
             'city.regex' => 'City should  contain only Alphabets',
             'name.regex' => 'Name should  contain only Alphabets',
             'file_id.required' => 'Graduate Degree id  is Required',
             'file_id.numeric' => 'Graduate Degree contain only number',
             'image_id.required' => 'Profile Image  is Required',
             'image_id.numeric' => 'Profile Image id contain only number',
         ]);

         if($validator->passes()){

         }
         else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
         }
        
    }
}
