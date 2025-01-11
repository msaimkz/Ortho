<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DoctorWorkingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workingTimes = DoctorWorkingTime::where('doctor_id',Auth::user()->id)->latest()->get();
        return view('Doctor.Working Time.index', compact('workingTimes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Doctor.Working Time.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $doctorId = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'day' => ['required', 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($validator->passes()) {

            $day = $request->day;
            $startTime = Carbon::parse($request->start_time);
            $endTime = Carbon::parse($request->end_time);

            $morningStart = Carbon::createFromTime(7, 0, 0); // 7:00 AM
            $nightEnd = Carbon::createFromTime(23, 59, 59);  // 12:00 AM

            if ($startTime->lt($morningStart) || $startTime->gt($nightEnd)) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'Start time must be between 7:00 AM and 12:00 AM.',
                ]);
            }



            $dailyCount = DoctorWorkingTime::where('doctor_id', $doctorId)
                ->where('day', $day)
                ->count();

            if ($dailyCount >= 3) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'You can only add up to 3 working times per day.'
                ]);
            }

            $weeklyDays = DoctorWorkingTime::where('doctor_id', $doctorId)
                ->distinct('day')
                ->count();

            if ($weeklyDays >= 4 && !DoctorWorkingTime::where('doctor_id', $doctorId)->where('day', $day)->exists()) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'You can only add working times for 4 days in a week.'
                ]);
            }

            if (!$startTime->lessThan($endTime)) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'Start time must be earlier than end time.'
                ]);
            }




            if ($startTime->diffInMinutes($endTime) != 120) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'A single working time can only be up to 2 hours.'
                ]);
            }

            $overlapping = DoctorWorkingTime::where('doctor_id', $doctorId)
                ->where('day', $day)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->where(function ($q) use ($startTime, $endTime) {

                        $q->whereTime('start_time', '<', $endTime)
                            ->whereTime('end_time', '>', $startTime);
                    })
                        ->orWhere(function ($q) use ($startTime, $endTime) {

                            $q->whereTime('end_time', '>', $startTime->subHours(2))
                                ->whereTime('end_time', '<=', $startTime)
                                ->orWhere(function ($q2) use ($startTime, $endTime) {
                                    $q2->whereTime('start_time', '<', $endTime->addHours(2))
                                        ->whereTime('start_time', '>=', $endTime);
                                });
                        });
                })
                ->exists();



            if ($overlapping) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'Working time conflicts with existing entries or does not meet the 2-hour gap requirement.',
                ]);
            }


            DoctorWorkingTime::create([
                'doctor_id' => $doctorId,
                'day' => $day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'status' => $request->status,
            ]);

            $doctor = DoctorProfile::where('user_id', Auth::user()->id)->first();


            $Schedules = DoctorWorkingTime::where('doctor_id', Auth::user()->id)->where('status', 'active')->count();

            if ($Schedules == 0) {
                $doctor->DoctorStatus = 'inactive';
                $doctor->save();
            }

            return response()->json([
                'status' => true,
                'msg' => 'Schedule  added successfully.'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Schedule = DoctorWorkingTime::find($id);

        if ($Schedule == null) {

            return redirect()->route('doctor.notfound');
        }

        return view('Doctor.Working Time.edit', compact('Schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Schedule = DoctorWorkingTime::find($id);

        if ($Schedule == null) {

            return response()->json([
                'status' => false,
                'isNotFound' => true,
                'error' => 'Schedule Not Found',
            ]);
        }

        $doctorId = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'day' => ['required', 'in:monday,tuesday,wednesday,thursday,friday,saturday,sunday'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($validator->passes()) {

            $day = $request->day;
            $startTime = Carbon::parse($request->start_time);
            $endTime = Carbon::parse($request->end_time);

            $morningStart = Carbon::createFromTime(7, 0, 0); // 7:00 AM
            $nightEnd = Carbon::createFromTime(23, 59, 59);  // 12:00 AM

            if ($startTime->lt($morningStart) || $startTime->gt($nightEnd)) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'Start time must be between 7:00 AM and 12:00 AM.',
                ]);
            }



            $dailyCount = DoctorWorkingTime::where('doctor_id', $doctorId)
                ->where('day', $day)
                ->count();

            if ($dailyCount >= 3) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'You can only add up to 3 working times per day.'
                ]);
            }

            $weeklyDays = DoctorWorkingTime::where('doctor_id', $doctorId)
                ->distinct('day')
                ->count();

            if ($weeklyDays >= 4 && !DoctorWorkingTime::where('doctor_id', $doctorId)->where('day', $day)->exists()) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'You can only add working times for 4 days in a week.'
                ]);
            }

            if (!$startTime->lessThan($endTime)) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'Start time must be earlier than end time.'
                ]);
            }




            if ($startTime->diffInMinutes($endTime) != 120) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'A single working time can only be up to 2 hours.'
                ]);
            }

            $overlapping = DoctorWorkingTime::where('doctor_id', $doctorId)
                ->where('day', $day)
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->where(function ($q) use ($startTime, $endTime) {

                        $q->whereTime('start_time', '<', $endTime)
                            ->whereTime('end_time', '>', $startTime);
                    })
                        ->orWhere(function ($q) use ($startTime, $endTime) {

                            $q->whereTime('end_time', '>', $startTime->subHours(2))
                                ->whereTime('end_time', '<=', $startTime)
                                ->orWhere(function ($q2) use ($startTime, $endTime) {
                                    $q2->whereTime('start_time', '<', $endTime->addHours(2))
                                        ->whereTime('start_time', '>=', $endTime);
                                });
                        });
                })
                ->exists();



            // if ($overlapping) {
            //     return response()->json([
            //         'status' => false,
            //         'validate' => false,
            //         'error' => 'Working time conflicts with existing entries or does not meet the 2-hour gap requirement.',
            //     ]);
            // }


            $Schedule->update([
                'doctor_id' => $doctorId,
                'day' => $day,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'status' => $request->status,
            ]);

            $doctor = DoctorProfile::where('user_id', Auth::user()->id)->first();


            $Schedules = DoctorWorkingTime::where('doctor_id', Auth::user()->id)->where('status', 'active')->count();

            if ($Schedules == 0) {
                $doctor->DoctorStatus = 'inactive';
                $doctor->save();
            }

            return response()->json([
                'status' => true,
                'msg' => 'Schedule  Updated successfully.'
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Schedule = DoctorWorkingTime::find($request->id);

        $doctor = DoctorProfile::where('user_id', $Schedule->doctor_id)->first();

        if ($Schedule == null) {

            return response()->json([
                'status' => false,
                'isNotFound' => true,
                'error' => 'Schedule Not Found',
            ]);
        }

        $Schedules = DoctorWorkingTime::where('doctor_id', $Schedule->doctor_id)->where('status', 'active')->count();

        if ($Schedules == 0) {
            $doctor->DoctorStatus = 'inactive';
            $doctor->save();
        }

        $Schedule->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => 'Schedule Deleted Successfully',
        ]);
    }
}
