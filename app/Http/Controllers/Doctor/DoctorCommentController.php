<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\DoctorComment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorCommentController extends Controller
{
    public function index()
    {

        $comments = DoctorComment::where('doctor_id',Auth::user()->id)->latest()->with('user')->get();

        return view('Doctor.Comment.index',compact('comments'));
    }

    public function show(string $id)
    {

        $comment = DoctorComment::where('id',$id)->with('user')->first();

        if($comment == null){

            return redirect()->route('doctor.notfound');
        }

        $comment->isView = "yes";
        $comment->save();

        return view('Doctor.Comment.show',compact('comment'));
    }

    public function reply()
    {

        return view('Doctor.Comment.reply');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:30', 'unique:doctor_comments'],
            'comment' => ['required', 'min:10'],
            'doctor_id' => ['required', 'numeric']
        ]);

        if ($validator->passes()) {

            if (Auth::check() == false) {

                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => "Access Denied: Please log in to your account to continue"
                ]);
            }

            if (Auth::user()->role != 'patients') {

                return response()->json([
                    'status' => false,
                    'isError' => false,
                    'error' => "Doctor and Admins are not allowed to submit comment to doctor."
                ]);
            }

            $doctor = User::find($request->doctor_id);

            if ($doctor == null) {

                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => "Doctor Not Found"
                ]);
            }

            $isCommentExist = DoctorComment::where('user_id', Auth::user()->id)->where('doctor_id', $request->doctor_id)->first();
            if ($isCommentExist != null) {
                return response()->json([
                    'status' => false,
                    'isError' => true,
                    'error' => "You already get a comment to this Doctor."
                ]);
            }

            $doctorComment = new DoctorComment();
            $doctorComment->user_id = Auth::user()->id;
            $doctorComment->doctor_id = $request->doctor_id;
            $doctorComment->name = $request->name;
            $doctorComment->email = $request->email;
            $doctorComment->comment = $request->comment;
            $doctorComment->save();

            return response()->json([
                'status' => true,
                'msg' => 'Thank you! Your Comment has been successfully sent. We will get back to you shortly'
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
}
