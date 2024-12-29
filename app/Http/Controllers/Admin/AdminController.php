<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
