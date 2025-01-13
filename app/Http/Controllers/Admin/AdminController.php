<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin\DoctorRequest;
use App\Models\Admin\AdminProfile;
use App\Models\TempFile;
use App\Models\TempImage;
use App\Rules\ValidDateOfBirth;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;


class AdminController extends Controller
{



    public function dashboard()
    {

        $patientCounts = User::where('role', 'patients')->count();

        $patients = User::where('role', 'patients')->latest()->limit(4)->get();

        $patientsCityCount = User::select('city', DB::raw('count(*) as total'))
            ->where('role', 'patients')
            ->groupBy('city')
            ->get();

        $doctorCounts = User::where('role', 'doctor')->count();
        $doctorRequestCount = DoctorRequest::where('status', 'pending')->count();


        // Delete Temp images here

        $lastBeforeDate = Carbon::now()->subDay(1)->format('Y-m-d H:i:s');
        $tempImages = TempImage::where('created_at', '<=', $lastBeforeDate)->get();

        foreach ($tempImages as $tempImage) {

            $path = public_path('/Uploads/temp/' . $tempImage->name);




            if (File::exists($path)) {
                File::delete($path);
            }

            // Thmb Images Delete Here


            TempImage::where('id', $tempImage->id)->delete();
        }

        // delete Temp Files
        $tempFiles = TempFile::where('created_at', '<=', $lastBeforeDate)->get();

        foreach ($tempFiles as $tempFile) {

            $path = public_path('/Uploads/TempFile/' . $tempFile->name);




            if (File::exists($path)) {
                File::delete($path);
            }

            // Thmb Images Delete Here


            TempFile::where('id', $tempFile->id)->delete();
        }



        return view('Admin.dashboard', compact('patientCounts', 'patients', 'patientsCityCount', 'doctorCounts', 'doctorRequestCount'));
    }

    public function Profile()
    {

        $id = Auth::user()->id;

        $profile = AdminProfile::where('user_id', $id)->first();

        if ($profile != null) {
            return view('Admin.profile', compact('profile'));
        } else {
            return view('Admin.profile');
        }
    }

    public function EditProfile()
    {

        $id = Auth::user()->id;

        $profile = AdminProfile::where('user_id', $id)->first();

        if ($profile != null) {
            return view('Admin.edit-profile', compact('profile'));
        } else {
            return view('Admin.edit-profile');
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

    public function UpdateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:30', 'unique:users,email,' . Auth::id()],
            'phone' => ['required', 'regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'city' =>  ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'age' =>   ['nullable', 'numeric', 'min:11', 'max:89'],
            'gender' => ['nullable', 'in:male,female'],
            'date_of_birth' => ['nullable', 'date', new ValidDateOfBirth()],
            'bio' => ['nullable', 'min:10', 'max:250'],
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
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->city = $request->city;
            $user->update();

            $profile = AdminProfile::updateOrCreate(
                ['user_id' => $id],
                [

                    'age' => $request->age,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth ? Carbon::parse($request->date_of_birth)->format('Y-m-d') : null,
                    'bio' => $request->bio,
                    'address' => $request->address,
                ]
            );

            return response()->json([
                'status' => true,
                'name' => $user->name,
                'address' => $profile->address,
                'msg' => 'Profile Update Successfully',
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    public function ProfileImg(Request $request)
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
            $dPath = public_path() . '/Uploads/Admin/ProfileImages/' . $NewImageName;

            if ($user->profile_photo_path != null) {
                $DeleteSourcePath = public_path() . '/Uploads/Admin/ProfileImages/' . $user->profile_photo_path;

                if (File::exists($DeleteSourcePath)) {
                    File::delete($DeleteSourcePath);
                }
            }

            $manager = new ImageManager(new Driver());
            $ImageManager = $manager->read($sPath);
            $ImageManager->cover(300, 300);
            $ImageManager->save($dPath);

            $user->profile_photo_path = $NewImageName;
            $user->save();

            return response()->json([
                'status' => true,
                'imageName' => $NewImageName,
                'msg' => 'Profile Image Updated Successfully',
            ]);
        }
    }

    public function notFound()
    {

        return view('Admin.not-found');
    }
}
