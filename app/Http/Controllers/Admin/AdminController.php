<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{

   

    public function dashboard(){

        return view('Admin.dashboard');
    }

    public function Profile(){

        return view('Admin.profile');
    }

    public function EditProfile(){

        return view('Admin.edit-profile');
    }

    public function ChangePassword(Request $request){
        
        $validator = Validator::make($request->all(),[
            'Currentpassword' => 'required',
            'password' => 'required|min:8|max:25|confirmed'
        ]);

        

        if($validator->passes()){
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

        }
        else{
            
             return response()->json([
               'status' => false,
                'errors' => $validator->errors(),
             ]);
        }
    }
}
