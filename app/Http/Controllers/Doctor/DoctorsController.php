<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Mail\AdminSendMail;
use App\Models\Appoinment;
use App\Models\Doctor\DoctorWorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidDateOfBirth;
use Illuminate\Support\Facades\Hash;
use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class DoctorsController extends Controller
{
    public function index()
    {

        $appointmentCount = Appoinment::where('doctor_id',Auth::user()->id)->where('status','pending')->count();
        $patientCount = Appoinment::where('doctor_id',Auth::user()->id)->count();

        $patientRecords = Appoinment::where('doctor_id',Auth::user()->id)->with('patient')->limit(5)->get();
        
        $patientsCityCount = User::select('city', DB::raw('count(*) as total'))
        ->join('appoinments', 'users.id', '=', 'appoinments.patient_id') 
        ->where('appoinments.doctor_id', Auth::user()->id) 
        ->where('users.role', 'patients') 
        ->groupBy('users.city') 
        ->get();      


        return view('Doctor.dashboard',compact('appointmentCount','patientCount','patientRecords','patientsCityCount'));
    }

    public function profile()
    {

        $profile = DoctorProfile::where('user_id', Auth::user()->id)->first();

        $Schedules = DoctorWorkingTime::where('doctor_id', Auth::user()->id)->get();

        return view('Doctor.profile', compact('profile', 'Schedules'));
    }

    public function Editprofile()
    {

        $profile = DoctorProfile::where('user_id', Auth::user()->id)->first();

        return view('Doctor.edit', compact('profile'));
    }

    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:30', 'unique:doctor_profiles,email,' . Auth::user()->id . ',user_id'],
            'phone' => ['required', 'regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'city' =>  ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'speciality' =>  ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'MedicalSchool' =>  ['required', 'min:3', 'max:250', 'regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'Certifications' =>  ['required', 'min:3', 'max:255', 'regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'Experience' =>  ['nullable', 'min:3', 'max:255', 'regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'Internship' =>  ['nullable', 'min:3', 'max:255', 'regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'age' =>   ['required', 'numeric', 'min:11', 'max:89'],
            'gender' => ['required', 'in:male,female'],
            'date_of_birth' => ['required', 'date', new ValidDateOfBirth()],
            'bio' => ['required', 'min:10'],
            'address' => ['required', 'min:10', 'max:150'],
            'Facebook' => ['required', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9_]+\/?$/'],
            'Instagram' => ['required', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?$/'],
            'Twitter' => ['required', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[A-Za-z0-9_]+\/?$/'],
        ], [
            'date_of_birth.date' => 'Date of birth must be a valid date',
            'age.min' => 'Age must be at least 11 years old',
            'age.max' => 'Age must be less than or equal to 89 years',
            'age.numeric' => 'Please enter a valid age',
            'city.regex' => 'City should  contain only Alphabets',
            'name.regex' => 'Name should  contain only Alphabets',
            'MedicalSchool.required' => 'Medical School Name Field is Required',
            'MedicalSchool.min' => 'Medical School Name minimum 3 letter required',
            'MedicalSchool.max' => 'Medical School Name maximum 24  letter required',
            'MedicalSchool.regex' => 'Medical School Name contain only Alphabets',
            'Certifications.required' => 'Certifications Field is Required',
            'Certifications.min' => 'Certifications minimum 3 letter required',
            'Certifications.max' => 'Certifications maximum 54  letter required',
            'Certifications.regex' => 'Certifications contain only Alphabets',
        ]);

        if ($validator->passes()) {


            $id = Auth::user()->id;
            $profile = DoctorProfile::updateOrCreate(
                ['user_id' => $id,],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'city' => $request->city,
                    'phone' => $request->phone,
                    'age' => $request->age,
                    'gender' => $request->gender,
                    'bio' => $request->bio,
                    'address' => $request->address,
                    'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),
                    'MedicalSchool' => $request->MedicalSchool,
                    'Certifications' => $request->Certifications,
                    'Experience' => $request->Experience,
                    'Internship' => $request->Internship,
                    'Facebook' => $request->Facebook,
                    'Instagram' => $request->Instagram,
                    'Twitter' => $request->Twitter,
                ]
            );

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->update();

            return response()->json([
                'status' => true,
                'name' => ucwords($user->name),
                'email' => $user->email,
                'phone' => $user->phone,
                'msg' => 'Profile Updated Successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function UpdateProfileImg(Request $request)
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        if ($user == null) {

            return response()->json([
                'status' => false,
                'error' => 'User Not Found'
            ]);
        }

        $image = $request->image;

        if (!empty($image)) {

            $ext = $image->getClientOriginalExtension();
            $NewImageName = $user->id . '-' . time() . '.' . $ext;

            $image->move(public_path() . '/Uploads/temp', $NewImageName);



            $sPath = public_path() . '/Uploads/temp/' . $NewImageName;
            $dPath = public_path() . '/Uploads/Doctor/Profile/' . $NewImageName;

            if ($user->profile_photo_path != null) {
                $DeleteSourcePath = public_path() . '/Uploads/Doctor/Profile/' . $user->profile_photo_path;

                if (File::exists($DeleteSourcePath)) {
                    File::delete($DeleteSourcePath);
                }
            }

            $manager = new ImageManager(new Driver());
            $ImageManager = $manager->read($sPath);
            $ImageManager->cover(380, 520);
            $ImageManager->save($dPath);


            $profile = DoctorProfile::where('user_id', $id)->first();
            $profile->profile_img = $NewImageName;
            $profile->save();

            $user->profile_photo_path = $NewImageName;
            $user->save();

            return response()->json([
                'status' => true,
                'imageName' => $NewImageName,
                'msg' => 'Profile Image Updated Successfully',
            ]);
        }
    }

    public function ChangePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Currentpassword' => 'required',
            'password' => 'required|min:8|max:25|confirmed'
        ]);



        if ($validator->passes()) {
            $currentPassword = Auth::user()->password;
            if (!Hash::check($request->Currentpassword, $currentPassword)) {
                return response()->json([
                    'status' => false,
                    'IsPasswordMatch' => false,
                    'msg' => 'Password Does Not Match',
                ]);
            }

            $id = Auth::user()->id;
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            $user->update();
            return response()->json([
                'status' => true,
                'msg' => 'Password Change Succesfully',
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function ChangeAccountStatus(Request $request)
    {


        $doctor = DoctorProfile::find($request->id);

        if($doctor == null){

            return response()->json([
                'status' => false,
                'isNotFound' => true,
                'error' => 'Record Not Found',
            ]);
        }

        $Schedules = DoctorWorkingTime::where('doctor_id' , $doctor->user_id)->where('status','active')->count();

        if($Schedules == 0){

            return response()->json([
                'status' => false,
                'isSchedules' => false,
                'error' => 'You cannot activate account without a scheduled',
            ]);
        }


        $admin = User::where('role', 'admin')->first();

        if ($doctor->DoctorStatus == 'active') {

            $doctor->DoctorStatus = 'inactive';
            $doctor->save();

            Mail::to($admin->email)->send(new AdminSendMail(
                [
                    'name' => $doctor->name,
                    'is_active' => false,
                ]
            ));
        } else {
            $doctor->DoctorStatus = 'active';
            $doctor->save();

            Mail::to($admin->email)->send(new AdminSendMail(
                [
                    'name' => $doctor->name,
                    'is_active' => true,
                ]
            ));
        }

        return response()->json([
            'status' => true,
            'accountStatus' => $doctor->DoctorStatus,
            'msg' => "Your Account Status Changed Successfully"
        ]);
    }


    public function notFound()
    {

        return view('Doctor.notFound');
    }
}
