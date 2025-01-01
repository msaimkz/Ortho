<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserAuthController extends Controller
{
    public function index(){
        if(Auth::user()->status != 'active'){

            return  redirect()->back()->withInput('error','Your Email is Block by Admin');
        }

        if(Auth::user()->role == 'patients'){
            return  redirect()->route('User.index');
        }
        elseif(Auth::user()->role == 'doctor'){
            return  redirect()->route('doctor.dashboard');
        }
        else{
            return redirect()->route('Admin.dashboard');
        }
    }
   
}

