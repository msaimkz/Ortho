<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\DashboardController;

Route::get('/d', function () {
    return view('welcome');
});



// User Routes

Route::get('/',[HomeController::class,'index'])->name('User.index');
Route::get('/Ortho/About',[HomeController::class,'about'])->name('User.about');
Route::get('/Ortho/Contact-Us',[HomeController::class,'contact'])->name('User.contact');
Route::get('/Ortho/Our-Services',[HomeController::class,'service'])->name('User.service');
Route::get('/Ortho/Our-Blogs',[HomeController::class,'blog'])->name('User.blog');
Route::get('/Ortho/Our-Doctors',[HomeController::class,'doctor'])->name('User.doctor');
Route::get('/Ortho/Our-Projects',[HomeController::class,'project'])->name('User.project');
Route::get('/Ortho/Our-TimeTable',[HomeController::class,'timetable'])->name('User.timetable');
Route::get('/Ortho/Blog-Detail',[HomeController::class,'blogDetail'])->name('User.blogDetail');
Route::get('/Ortho/Doctor-Detail',[HomeController::class,'DoctorDetail'])->name('User.DoctorDetail');
Route::get('/Ortho/Service-Detail',[HomeController::class,'serviceDetail'])->name('User.serviceDetail');
Route::get('/Ortho/404',[HomeController::class,'error'])->name('User.error');
Route::get('/Ortho/Booking-Appionment',[HomeController::class,'apoinment'])->name('User.apoinment');



// User Dashboard Routes

Route::get('/Ortho/Dashboard',[DashboardController::class,'dashboard'])->name('User.dashboard.dashboard');
