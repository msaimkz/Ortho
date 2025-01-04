<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidDateOfBirth;
use App\Models\Admin\DoctorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use App\Models\TempImage;
use App\Models\TempFile;
use Carbon\Carbon;


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
            'email' => ['required','email','max:30'],
            'phone' => ['required','regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'city' =>  ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'speciality' =>  ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'age' =>   ['required','numeric','min:11','max:89'],
            'gender' => ['required','in:male,female'],
            'date_of_birth' => ['required','date',new ValidDateOfBirth()],
            'bio' => ['required','min:10'],
            'address' => ['required','min:10','max:150'],
            'file_id' => ['required','numeric'],
            'image_id' => ['required','numeric'],
            'facebook' => ['required','regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9_]+\/?$/'],
            'Instagram' => ['required','regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?$/'],
            'Twitter' => ['required','regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[A-Za-z0-9_]+\/?$/'],
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

            $doctorRequestExist = DoctorRequest::where('email',$request->email)->first();

            if($doctorRequestExist != null){

                return response()->json([
                    'status' => false,
                    'IsAlreadyRegister' => true,
                    'error' => 'You have already sent a request for this doctor.'
                ]);
            }

           

            $doctorRequest = new DoctorRequest();
            $doctorRequest->user_id = Auth::user()->id;
            $doctorRequest->name = $request->name;
            $doctorRequest->email = $request->email;
            $doctorRequest->phone = $request->phone;
            $doctorRequest->city = $request->city;
            $doctorRequest->age = $request->age;
            $doctorRequest->gender = $request->gender;
            $doctorRequest->Speciality = $request->speciality;
            $doctorRequest->date_of_birth = $request->date_of_birth ? Carbon::parse($request->date_of_birth)->format('Y-m-d') : null;
            $doctorRequest->bio = $request->bio; 
            $doctorRequest->address = $request->address; 
            $doctorRequest->Facebook = $request->facebook;
            $doctorRequest->Instagram = $request->Instagram;
            $doctorRequest->Twitter = $request->Twitter;
            $doctorRequest->profile_img = 'image';
            $doctorRequest->graduate_degree = 'pdf';
            $doctorRequest->save();

            // profile image

            if($request->image_id != null){

                $imageID = $request->image_id;
                $tempImage = TempImage::find($imageID);
                $extArray = explode(',',$tempImage->name);
                $ext = last($extArray);
                


                $newImageName = $doctorRequest->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/temp/'.$tempImage->name;
                $Dpath = public_path().'/Uploads/Doctor Request/'.$newImageName;

                $doctorRequest->profile_img = $newImageName;
                $doctorRequest->save();

                File::copy($TempSourcePath,$Dpath);

                $Dpath = public_path().'/Uploads/Doctor Request/Profile/'.$newImageName;

                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                $ImageManager->cover(300,300);
                $ImageManager->save($Dpath);
            }

             // Graduate Degree

             if($request->file_id != null){

                $fileID = $request->file_id;
                $FileImage = TempFile::find($fileID);
                $extArray = explode(',',$FileImage->name);
                $ext = last($extArray);


                $newFileName = $doctorRequest->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/TempFile/'.$FileImage->name;
                $Dpath = public_path().'/Uploads/Doctor Request/Degree/'.$newFileName;

                $doctorRequest->graduate_degree = $newFileName;
                $doctorRequest->save();

                File::copy($TempSourcePath,$Dpath);


            }

            return response()->json([
                'status' => true,
                'msg' => 'Your Doctor Registration Request Send Successfully'
            ]);

         }
         else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
         }
        
    }
}
