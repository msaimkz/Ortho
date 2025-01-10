<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor\DoctorWorkingTime;
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
        $workingTimes = DoctorWorkingTime::latest()->get();
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
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        if ($validator->passes()) {

            $day = $request->day;
            $startTime = Carbon::createFromFormat('h:i A', $request->start_time);
            $endTime = Carbon::createFromFormat('h:i A', $request->end_time);
          

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

           
            
            if ($endTime->diffInMinutes($startTime) > 120) {
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
                    });
                })
                ->exists();

            if ($overlapping) {
                return response()->json([
                    'status' => false,
                    'validate' => false,
                    'error' => 'There must be at least a 2-hour gap between working times.'
                ]);
            }

            DoctorWorkingTime::create([
                'doctor_id' => $doctorId,
                'day' => $day,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'status' => $request->status,
            ]);

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
}
