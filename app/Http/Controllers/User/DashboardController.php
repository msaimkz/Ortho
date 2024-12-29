<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
    public function dashboard(){

        return view('User.Dashboard.Dashboard');
    }

    public function profile(){

        return view('User.Dashboard.profile');
    }
}
