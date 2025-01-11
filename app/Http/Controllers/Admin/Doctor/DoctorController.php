<?php

namespace App\Http\Controllers\Admin\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidDateOfBirth;
use App\Models\Admin\DoctorRequest;
use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use App\Models\TempImage;
use App\Models\TempFile;
use Carbon\Carbon;
use App\Mail\Admin\DoctorRequestMail;
use App\Mail\Admin\DoctorStatusMail;
use App\Mail\Admin\DoctorDeleteMail;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    public function doctor(){


        $doctors = DoctorProfile::latest()->get();

        return view('Admin.Doctor.doctor',compact('doctors'));
    }

    public function profile(string $id){

        $doctor = DoctorProfile::find($id);
        return view('Admin.Doctor.doctor-profile',compact('doctor'));
    }

    public function ChangeStatus(Request $request){

        $id = $request->id;
        

        $doctor = DoctorProfile::find($id);

        if($doctor->status == 'active'){

            $doctor->status = 'block';
            $doctor->save();

            Mail::to($doctor->email)->send(new DoctorStatusMail(
                [
                    'name' => $doctor->name,
                    'status' => $doctor->status,
                ]
            ));

            return response()->json([
                'status' => true,
                'Doctorstatus' => 'block',
                'msg' => $doctor->name. ' Account Blocked Succesfully'
            ]);
        }
        else{

            $doctor->status = 'active';
            $doctor->save();

            Mail::to($doctor->email)->send(new DoctorStatusMail(
                [
                    'name' => $doctor->name,
                    'status' => $doctor->status,
                ]
            ));

            return response()->json([
                'status' => true,
                'Doctorstatus' => 'active',
                'msg' => $doctor->name. ' Account Activated Succesfully'
            ]);
        }
        
    }

    public function Delete (Request $request){
        $id = $request->id;

        $doctor = DoctorProfile::find($id);
        $name = $doctor->name;

        $dpath = public_path().'/Uploads/Doctor/Profile/'. $doctor->profile_img;

        if(File::exists($dpath)){
 
         File::delete($dpath);
        }
 
 
        $dpath = public_path().'/Uploads/Doctor/Degree/'. $doctor->graduate_degree;
 
        if(File::exists($dpath)){
 
         File::delete($dpath);
        }

        Mail::to($doctor->email)->send(new DoctorDeleteMail(
            [
                'name' => $doctor->name,
            ]
        ));

        $user = User::where('id',$doctor->user_id)->first();
        $user->delete();

        $doctor->delete();

        return response()->json([
            'status' => true,
            'msg' => $name. " Account Deleted Succesfully"
        ]);
        
        
    }

    public function request(){

        $doctorRequests = DoctorRequest::all();

        return view('Admin.Doctor.request',compact('doctorRequests'));
    }

    public function requestProfile(string $id){
 

        $doctorRequest = DoctorRequest::find($id);
 

        return view('Admin.Doctor.request-profile',compact('doctorRequest'));
    }

    public function DoctorRegiestration(Request $request){


        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required','email','max:30','unique:doctor_requests,email,'. Auth::user()->id .',user_id'],
            'phone' => ['required','regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'city' =>  ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'speciality' =>  ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
            'MedicalSchool' =>  ['required','min:3','max:250','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'Certifications' =>  ['required','min:3','max:255','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'Experience' =>  ['nullable','min:3','max:255','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'Internship' =>  ['nullable','min:3','max:255','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
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
             'MedicalSchool.required' => 'Medical School Name Field is Required',
             'MedicalSchool.min' => 'Medical School Name minimum 3 letter required',
             'MedicalSchool.max' => 'Medical School Name maximum 24  letter required',
             'MedicalSchool.regex' => 'Medical School Name contain only Alphabets',
             'Certifications.required' => 'Certifications Field is Required',
             'Certifications.min' => 'Certifications minimum 3 letter required',
             'Certifications.max' => 'Certifications maximum 54  letter required',
             'Certifications.regex' => 'Certifications contain only Alphabets',
         ]);

         if($validator->passes()){

            $doctorRequestExist = DoctorRequest::where('email',$request->email)->orWhere('user_id',Auth::user()->id)->first();

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
            $doctorRequest->MedicalSchool = $request->MedicalSchool;
            $doctorRequest->Certifications = $request->Certifications;
            $doctorRequest->Experience = $request->Experience;
            $doctorRequest->Internship = $request->Internship;
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

    public function requestProfileStatus(Request $request){
       
        if($request->status == 'approve'){

            $id = $request->id;

            $doctorRequest = DoctorRequest::find($id);
            $doctorProfile = new DoctorProfile();

            $doctorProfile->user_id = $doctorRequest->user_id;
            $doctorProfile->name = $doctorRequest->name;
            $doctorProfile->email = $doctorRequest->email;
            $doctorProfile->phone = $doctorRequest->phone;
            $doctorProfile->city = $doctorRequest->city;
            $doctorProfile->age = $doctorRequest->age;
            $doctorProfile->gender = $doctorRequest->gender;
            $doctorProfile->date_of_birth = $doctorRequest->date_of_birth;
            $doctorProfile->speciality = $doctorRequest->speciality;
            $doctorProfile->bio = $doctorRequest->bio;
            $doctorProfile->address = $doctorRequest->address;
            $doctorProfile->MedicalSchool = $doctorRequest->MedicalSchool;
            $doctorProfile->Certifications = $doctorRequest->Certifications;
            $doctorProfile->Experience = $doctorRequest->Experience;
            $doctorProfile->Internship = $doctorRequest->Internship;
            $doctorProfile->Facebook = $doctorRequest->Facebook;
            $doctorProfile->Instagram = $doctorRequest->Instagram;
            $doctorProfile->Twitter = $doctorRequest->Twitter;
            $doctorProfile->profile_img = $doctorRequest->profile_img;
            $doctorProfile->graduate_degree = $doctorRequest->graduate_degree;
            $doctorProfile->save();

            $doctorRequest->status = 'approve';
            $doctorRequest->save();

            $doctor = User::find($doctorRequest->user_id);
            $doctor->role = 'doctor';
            $doctor->profile_photo_path = $doctorRequest->profile_img;
            $doctor->save();

            $spath = public_path().'/Uploads/Doctor Request/Profile/'. $doctorRequest->profile_img;
            $dpath = public_path().'/Uploads/Doctor/Profile/'.$doctorRequest->profile_img;

            File::copy($spath,$dpath);

            $spath = public_path().'/Uploads/Doctor Request/Degree/'. $doctorRequest->graduate_degree;
            $dpath = public_path().'/Uploads/Doctor/Degree/'.$doctorRequest->graduate_degree;

            File::copy($spath,$dpath);

            Mail::to($doctorRequest->email)->send(new DoctorRequestMail(
                [
                    'name' => $doctorRequest->name,
                    'status' => $doctorRequest->status,
                ]
            ));

            return response()->json([
                'status' => true,
                'msg' => $doctorRequest->name.' Doctor Registration Request Approved Successfully',
            ]);

        }
        else{
            $id = $request->id;

            $doctorRequest = DoctorRequest::find($id);
            $doctorRequest->status = 'reject';
            $doctorRequest->save();

            Mail::to($doctorRequest->email)->send(new DoctorRequestMail(
                [
                    'name' => $doctorRequest->name,
                    'status' => $doctorRequest->status,
                ]
            ));

            return response()->json([
                'status' => true,
                'msg' => $doctorRequest->name.' Doctor Registration Request Rejected Successfully',
            ]);
        }
    }

    public function requestDelete(Request $request){

       $doctorRequest = DoctorRequest::find($request->id);

       $dpath = public_path().'/Uploads/Doctor Request/Profile/'. $doctorRequest->profile_img;

       if(File::exists($dpath)){

        File::delete($dpath);
       }

       $dpath = public_path().'/Uploads/Doctor Request/'. $doctorRequest->profile_img;

       if(File::exists($dpath)){

        File::delete($dpath);
       }


       $dpath = public_path().'/Uploads/Doctor Request/Degree/'. $doctorRequest->graduate_degree;

       if(File::exists($dpath)){

        File::delete($dpath);
       }

       $doctorRequest->delete();

       return response()->json([
        'status' => true,
        'msg' => 'Doctor Request Deleted Succesfully',
       ]);
    }
}
