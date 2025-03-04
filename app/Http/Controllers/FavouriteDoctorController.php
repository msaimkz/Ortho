<?php

namespace App\Http\Controllers;

use App\Models\FavouriteDoctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteDoctorController extends Controller
{
    public function store(Request $request){

        if(Auth::check() == false){

            return response()->json([
                'status' => false,
                'IsError' => false,
                'error' => "Access Denied: Please log in to your account to continue"
            ]);
        }

        if (Auth::user()->role != "patients") {

            return response()->json([
                'status' => false,
                'isError' => true,
                'error' => 'Doctors and Admins are not allowed to Add a Favourite  doctor.'
            ]);
        }

        $user = Auth::user()->id; 
        $doctor = User::find($request->id);
        FavouriteDoctor::updateOrCreate(
            [
                'user_id' => $user,
                'doctor_id' => $doctor->id,
            ],
            [
                'user_id' => $user,
                'doctor_id' => $doctor->id,
            ]
        );

        return response()->json([
            'status' => true,
            'msg' => "Dr: ".ucwords($doctor->name)." add successfully to our Favourite Doctors List"
        ]);


    }

    public function remove(Request $request){

        $doctor = FavouriteDoctor::find($request->id);

        if($doctor == null){

            return response()->json([
                'status' => false,
                'error' => "Favourite Doctor Not Found"
            ]);
        }

        $user = User::where('id',$doctor->doctor_id)->first();
        $doctor->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg'=> "Dr : ".ucwords($user->name)." has been remove your Favourite doctors list",
        ]);
    }
}
