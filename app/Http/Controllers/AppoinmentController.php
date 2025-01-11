<?php

namespace App\Http\Controllers;

use App\Models\Doctor\DoctorWorkingTime;
use App\Models\DoctorProfile;
use Illuminate\Http\Request;

class AppoinmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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

    public function GetTime(Request $request){

        $doctor = DoctorProfile::where('user_id',$request->doctorid)->first();

        if($doctor == null){

            return response()->json([
                'status' => false,
                'error' => "Doctor Not Found",
            ]);
        }

        $time = DoctorWorkingTime::where('doctor_id',$doctor->user_id)->where('day',$request->day)->get();

        return response()->json([
            'status' => true,
            'time' => $time,
            'msg' => 'Doctor Working Time Get Sucessfully',
        ]);
    }
}
