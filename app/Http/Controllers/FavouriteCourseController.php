<?php

namespace App\Http\Controllers;

use App\Models\Admin\Course;
use App\Models\FavouriteCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteCourseController extends Controller
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
        $course = Course::find($request->id);
        FavouriteCourse::updateOrCreate(
            [
                'user_id' => $user,
                'course_id' => $course->id,
            ],
            [
                'user_id' => $user,
                'course_id' => $course->id,
            ]
        );

        return response()->json([
            'status' => true,
            'msg' => "This Course is add successfully to our Favourite Courses List"
        ]);


    }

    public function remove(Request $request){

        $course = FavouriteCourse::find($request->id);

        if($course == null){

            return response()->json([
                'status' => false,
                'error' => "Favourite Course Not Found"
            ]);
        }

        $course->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg'=> "This Course has been remove your Favourite courses list",
        ]);
    }
}
