<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentCancellMail;
use App\Mail\AppointmentMail;
use App\Mail\DoctorAppointmentInformMail;
use App\Mail\UserAppointmentCancelMail;
use App\Models\Appoinment;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use App\Models\TempFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appoinment::where('doctor_id', Auth::user()->id)->latest()->get();

        return view('Doctor.Appointment.appointment', compact('appointments'));
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
            'illness' => ['required', 'min:10', 'max:350'],
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
                ->where(function ($query) use ($request, $time) {
                    $query->whereBetween('start_time', [$time->start_time, $time->end_time])
                        ->orWhereBetween('end_time', [$time->start_time, $time->end_time])
                        ->orWhere(function ($query) use ($request, $time) {
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
            $appoinment->illness = $request->illness;
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

            Mail::to($doctor->email)->send(new DoctorAppointmentInformMail(
                [
                    'patientName' => $appoinment->name,
                    'appointmentDate' => $appoinment->date,
                    'appointmentStartTime' => $appoinment->start_time,
                    'appointmentEndTime' => $appoinment->end_time,
                    'doctorName' => $doctor->name,

                ]
            ));

            return response()->json([
                'status' => true,
                'msg' => "Your appointment with Dr " .  $doctor->name  . " has been successfully scheduled!"
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
    public function show(string $id)
    {

        $appointment = Appoinment::find($id);

        if ($appointment == null) {

            return redirect()->route('doctor.notfound');
        }

        return view('Doctor.Appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function Cancel(Request $request)
    {
        $appointment = Appoinment::find($request->id);

        if ($appointment == null) {

            return response()->json([
                'status' => false,
                'isNotFound' => true,
                'error' => "Appointment Not Found",
            ]);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'id' => ['required', 'numeric'],
                'doctor_cancellation_reason' => ['required', 'min:10'],
            ],
            [
                'doctor_cancellation_reason.required' => "Cancellation Reason Field is Required",
                'doctor_cancellation_reason.min' => "Cancellation Reason required minimum 10 letter"
            ]
        );

        if ($validator->passes()) {

            $doctor = DoctorProfile::where('user_id', $appointment->doctor_id)->first();

            $appointment->status = 'cancelled';
            $appointment->doctor_cancellation_reason = $request->doctor_cancellation_reason;
            $appointment->save();

            Mail::to($appointment->email)->send(new AppointmentCancellMail(
                [
                    'patientName' => $appointment->name,
                    'status' => $appointment->status,
                    'appointmentDate' => $appointment->date,
                    'appointmentStartTime' => $appointment->start_time,
                    'appointmentEndTime' => $appointment->end_time,
                    'doctorName' => $doctor->name,
                    'Reason' => $appointment->doctor_cancellation_reason,
                ]
            ));

            return response()->json([
                'status' => true,
                'AppointmentStatus' => $appointment->status,
                'reason' => ucwords($appointment->doctor_cancellation_reason),
                'msg' =>  "Patient Appointemnt Cancelled Successfully",
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function changeStatus(Request $request)
    {
        $appointment = Appoinment::find($request->id);
        $doctor = DoctorProfile::where('user_id', $appointment->doctor_id)->first();
        $status = '';

        if ($appointment == null) {

            return response()->json([
                'status' => false,
                'error' => "Appointment Not Found"
            ]);
        }

        if ($request->status == 'approve') {

            $appointment->status = 'approved';
            $appointment->save();

            $status = 'approved';

            Mail::to($appointment->email)->send(new AppointmentMail(
                [
                    'patientName' => $appointment->name,
                    'status' => $status,
                    'appointmentDate' => $appointment->date,
                    'appointmentStartTime' => $appointment->start_time,
                    'appointmentEndTime' => $appointment->end_time,
                    'doctorName' => $doctor->name,
                ]
            ));

            return response()->json([
                'status' => true,
                'AppointmentStatus' => $status,
                'msg' => 'Patient Appointment ' . ucwords($status) . ' Successfully',
            ]);
        } else {

            $appointment->status = 'rejected';
            $appointment->save();

            $status = 'rejected';
            $reason = 'The doctor is unavailable during the requested time.';

            Mail::to($appointment->email)->send(new AppointmentMail(
                [
                    'patientName' => $appointment->name,
                    'status' => $status,
                    'appointmentDate' => $appointment->date,
                    'appointmentStartTime' => $appointment->start_time,
                    'appointmentEndTime' => $appointment->end_time,
                    'doctorName' => $doctor->name,
                    'rejectionReason' => $reason,
                ]
            ));

            return response()->json([
                'status' => true,
                'AppointmentStatus' => $status,
                'msg' => 'Patient Appointment ' . ucwords($status) . ' Successfully',
            ]);
        }


        return response()->json([
            'status' => false,
            'error' => "Unknown Appointment Status"
        ]);
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

    public function UserCancelAppointment(Request $request)
    {

        $appointment = Appoinment::find($request->id);

        if ($appointment == null) {

            return response()->json([
                'status' => false,
                'isNotFound' => true,
                'error' => "Appointment Not Found",
            ]);
        }

        $validator = Validator::make($request->all(), [
            'id' => ['required', 'numeric'],
            'user_cancellation_reason' => ['required', 'min:10'],
        ],
        [
            'user_cancellation_reason.required' => "Cancellation Reason Field is Required",
            'user_cancellation_reason.min' => "Cancellation Reason required minimum 10 letter"
        ]
    );

        if ($validator->passes()) {

            $doctor = DoctorProfile::where('user_id', $appointment->doctor_id)->first();

            $appointment->status = 'cancelled';
            $appointment->user_cancelled = 'cancelled';
            $appointment->user_cancellation_reason = $request->user_cancellation_reason;
            $appointment->save();

            Mail::to($doctor->email)->send(new UserAppointmentCancelMail(
                [
                    'patientName' => $appointment->name,
                    'status' => $appointment->status,
                    'appointmentDate' => $appointment->date,
                    'appointmentStartTime' => $appointment->start_time,
                    'appointmentEndTime' => $appointment->end_time,
                    'doctorName' => $doctor->name,
                    'Reason' => $appointment->user_cancellation_reason,
                ]
            ));

            return response()->json([
                'status' => true,
                'AppointmentStatus' => $appointment->status,
                'reason' => ucwords($appointment->user_cancellation_reason),
                'msg' =>  "Your Appointment Cancelled Successfully",
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
}
