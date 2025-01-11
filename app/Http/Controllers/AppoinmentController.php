<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use App\Models\TempFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appoinment::where('doctor_id',Auth::user()->id)->latest()->get();

        return view('Doctor.Appointment.appointment',compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email'],
            'doctor_id' => ['required', 'numeric'],
            'day' => ['required', 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'numeric'],
            'report_id' => ['nullable', 'numeric'],
        ]);

        if ($validator->passes()) {

            $doctor = DoctorProfile::find($request->doctor_id);

            if ($doctor == null) {

                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => "Doctor Not Found",
                ]);
            }

            $time = DoctorWorkingTime::find($request->time);

            if ($time == null) {
                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => "Doctor Schedule Not Found",
                ]);
            }

            if ($request->doctor_id == Auth::user()->id) {

                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => "Doctor cannot book an appointment for themselves",
                ]);
            }

            $selectedDate = Carbon::parse($request->date);
            $dayOfWeek = strtolower($selectedDate->format('l'));



            $doctorWorkingDays = DoctorWorkingTime::where('doctor_id', $doctor->user_id)
                ->pluck('day')
                ->toArray();

            if (!in_array($dayOfWeek, $doctorWorkingDays)) {
                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => 'Selected date does not match the doctor\'s working days.'
                ]);
            }

            $existingAppointment = Appoinment::where('doctor_id', $doctor->user_id)
                ->where('patient_id', Auth::user()->id)
                ->whereDate('date', $request->date)
                ->exists();

            if ($existingAppointment) {
                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => 'You can only book one appointment with the same doctor on a single day.'
                ]);
            }

            $timeConflict = Appoinment::where('patient_id', Auth::user()->id)
                ->where('date', $request->date)
                ->where(function ($query) use ($request,$time) {
                    $query->whereBetween('start_time', [$time->start_time, $time->end_time])
                        ->orWhereBetween('end_time', [$time->start_time, $time->end_time])
                        ->orWhere(function ($query) use ($request,$time) {
                            $query->where('start_time', '<=', $time->start_time)
                                ->where('end_time', '>=', $time->end_time);
                        });
                })
                ->exists();
                
            if ($timeConflict) {
                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => 'You cannot book multiple appointments at the same time on the same day.'
                ]);
            }



            $appoinment = new Appoinment();
            $appoinment->doctor_id = $doctor->user_id;
            $appoinment->patient_id = Auth::user()->id;
            $appoinment->name = $request->name;
            $appoinment->email = $request->email;
            $appoinment->date = $request->date;
            $appoinment->day = $request->day;
            $appoinment->start_time = $time->start_time;
            $appoinment->end_time = $time->end_time;
            $appoinment->save();

            if ($request->report_id != null) {

                $fileID = $request->report_id;
                $FileImage = TempFile::find($fileID);
                $extArray = explode(',', $FileImage->name);
                $ext = last($extArray);


                $newFileName = $appoinment->id . '-' . time() . '.' . $ext;

                $TempSourcePath = public_path() . '/Uploads/TempFile/' . $FileImage->name;
                $Dpath = public_path() . '/Uploads/Appoinment/Report/' . $newFileName;

                $appoinment->report = $newFileName;
                $appoinment->save();

                File::copy($TempSourcePath, $Dpath);
            }

            return response()->json([
                'status' => true,
                'msg' => "Your appointment with Dr ".  $doctor->name  ." has been successfully scheduled!"
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function GetTime(Request $request)
    {

        $doctor = DoctorProfile::where('user_id', $request->doctorid)->first();

        if ($doctor == null) {

            return response()->json([
                'status' => false,
                'error' => "Doctor Not Found",
            ]);
        }

        $time = DoctorWorkingTime::where('doctor_id', $doctor->user_id)->where('day', $request->day)->get();

        return response()->json([
            'status' => true,
            'time' => $time,
            'msg' => 'Doctor Working Time Get Sucessfully',
        ]);
    }
}
