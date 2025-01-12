<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appoinment;
use App\Models\Patient\PatientProfile;
use App\Models\User;
use App\Rules\ValidDateOfBirth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function dashboard()
    {

        return view('User.Dashboard.Dashboard');
    }

    public function profile()
    {

        $profile = PatientProfile::where('user_id', Auth::user()->id)->first();

        return view('User.Dashboard.profile', compact('profile'));
    }

    public function Editprofile()
    {

        $profile = PatientProfile::where('user_id', Auth::user()->id)->first();

        return view('User.Dashboard.Edit-Profile', compact('profile'));
    }

    public function UpdateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:30', 'unique:users,email,' . Auth::user()->id . ',id'],
            'phone' => ['required', 'regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'city' =>  ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'age' =>   ['nullable', 'numeric', 'min:11', 'max:89'],
            'gender' => ['nullable', 'in:male,female'],
            'date_of_birth' => ['nullable', 'date', new ValidDateOfBirth()],
            'bio' => ['nullable', 'min:10'],
            'address' => ['nullable', 'min:10', 'max:150'],
        ], [
            'date_of_birth.date' => 'Date of birth must be a valid date',
            'age.min' => 'Age must be at least 11 years old',
            'age.max' => 'Age must be less than or equal to 89 years',
            'age.numeric' => 'Please enter a valid age',
            'city.regex' => 'City should  contain only Alphabets',
            'name.regex' => 'Name should  contain only Alphabets',
        ]);

        if ($validator->passes()) {
            $id = Auth::user()->id;

            $profile = PatientProfile::updateOrCreate(

                ['user_id' => $id,],
                [

                    'age' => $request->age,
                    'gender' => $request->gender,
                    'bio' => $request->bio,
                    'address' => $request->address,
                    'date_of_birth' => Carbon::parse($request->date_of_birth)->format('Y-m-d'),

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
            $dPath = public_path() . '/Uploads/Patient/Profile/' . $NewImageName;

            if ($user->profile_photo_path != null) {
                $DeleteSourcePath = public_path() . '/Uploads/Patient/Profile/' . $user->profile_photo_path;

                if (File::exists($DeleteSourcePath)) {
                    File::delete($DeleteSourcePath);
                }
            }

            $manager = new ImageManager(new Driver());
            $ImageManager = $manager->read($sPath);
            $ImageManager->cover(300, 300);
            $ImageManager->save($dPath);


            $profile = PatientProfile::where('user_id', $id)->first();
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

    public function appoinment()
    {

        $appointments = Appoinment::where('patient_id',Auth::user()->id)->with('doctor')->latest()->get();
        return view('User.Dashboard.appoinment',compact('appointments'));
    }

    public function AppoinmentDetail(string $id){

        $appointment = Appoinment::find($id);

        if($appointment == null){

            return redirect()->route('User.dashboard.error');
        }

        return view('User.Dashboard.show-appointment',compact('appointment'));
    }

    public function error(){

        return view('User.Dashboard.error');
    }
}
