<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserAuthController extends Controller
{
    public function statusblockError()
    {
        return view('error.account');
    }
    public function accessBlock()
    {

        return view('error.access');
    }

    public function index()
    {
        if (Auth::user()->status != 'active') {

            Auth::logout();
            return  redirect()->route('statusblockError');
        }

        if (Auth::user()->role == 'patients') {
            if (session()->has('url.intended')) {
                return redirect(session()->get('url.intended'));
            }
            
            return  redirect()->route('User.index');
        } elseif (Auth::user()->role == 'doctor') {
            return  redirect()->route('doctor.dashboard');
        } else {
            return redirect()->route('Admin.dashboard');
        }
    }
}
