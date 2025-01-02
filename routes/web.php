<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Patient\PatientController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\Project\ProjectController;
use App\Http\Controllers\Admin\Subscription\SubscriptionController;
use App\Http\Controllers\Doctor\DoctorsController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\UserAuthController;
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
Route::get('/Ortho/Doctor-Registration',[HomeController::class,'DoctorRegistration'])->name('User.doctorRegiestraion');



// User Dashboard Routes

Route::get('/Ortho/Dashboard',[DashboardController::class,'dashboard'])->name('User.dashboard.dashboard');
Route::get('/Ortho/Dashboard/My-Profile',[DashboardController::class,'profile'])->name('User.dashboard.profile');
Route::get('/Ortho/Dashboard/Update-Profile',[DashboardController::class,'Editprofile'])->name('User.dashboard.edit-profile');
Route::get('/Ortho/Dashboard/My-Appointment',[DashboardController::class,'appoinment'])->name('User.dashboard.appoinment');




// Admin Dashboard Routes
Route::get('/Ortho/Admin/Dashboard',[AdminController::class,'dashboard'])->name('Admin.dashboard');
Route::get('/Ortho/Admin/Profile',[AdminController::class,'Profile'])->name('Admin.profile');
Route::get('/Ortho/Admin/Update-Profile',[AdminController::class,'EditProfile'])->name('Admin.profile.edit');
Route::get('/Ortho/Admin/All-Doctors',[DoctorController::class,'doctor'])->name('Admin.doctor');
Route::get('/Ortho/Admin/Doctor-Profile',[DoctorController::class,'profile'])->name('Admin.doctor.profile');
Route::get('/Ortho/Admin/Doctor-Registration-Requests',[DoctorController::class,'request'])->name('Admin.doctor.request');
Route::get('/Ortho/Admin/Doctor-Request-Proflie',[DoctorController::class,'requestProfile'])->name('Admin.doctor.request-profile');
Route::get('/Ortho/Admin/All-Patients',[PatientController::class,'index'])->name('Admin.patients');
Route::get('/Ortho/Admin/Patient-Profile/{id}',[PatientController::class,'profile'])->name('Admin.patients.profile');
Route::get('/Ortho/Admin/Change-Patient-Status/{id}',[PatientController::class,'status'])->name('Admin.patients.statusChange');
Route::get('/Ortho/Admin/All-Blogs',[BlogController::class,'blog'])->name('Admin.blog');
Route::get('/Ortho/Admin/Blog-Detail',[BlogController::class,'detail'])->name('Admin.blog.detail');
Route::get('/Ortho/Admin/Create-Blog',[BlogController::class,'create'])->name('Admin.blog.create');
Route::get('/Ortho/Admin/Edit-Blog',[BlogController::class,'edit'])->name('Admin.blog.edit');
Route::get('/Ortho/Admin/All-Services',[ServiceController::class,'index'])->name('Admin.service');
Route::get('/Ortho/Admin/Service-Detail',[ServiceController::class,'show'])->name('Admin.service.detail');
Route::get('/Ortho/Admin/Create-Service',[ServiceController::class,'create'])->name('Admin.service.create');
Route::get('/Ortho/Admin/Edit-Service',[ServiceController::class,'edit'])->name('Admin.service.edit');
Route::get('/Ortho/Admin/All-Projects',[ProjectController::class,'index'])->name('Admin.project');
Route::get('/Ortho/Admin/Create-Project',[ProjectController::class,'create'])->name('Admin.project.create');
Route::get('/Ortho/Admin/Edit-Project',[ProjectController::class,'edit'])->name('Admin.project.edit');
Route::get('/Ortho/Admin/All-Subscriptions',[SubscriptionController::class,'index'])->name('Admin.subscripion');
Route::get('/Ortho/Admin/Create-Subscription',[SubscriptionController::class,'create'])->name('Admin.subscripion.create');
Route::get('/Ortho/Admin/Edit-Subscription',[SubscriptionController::class,'edit'])->name('Admin.subscripion.edit');
Route::get('/Ortho/Admin/Subscribe-Patients',[SubscriptionController::class,'show'])->name('Admin.subscripion.subscriber');
Route::post('/Ortho/Admin/Change-Password',[AdminController::class,'ChangePassword'])->name('Admin.ChangePassword');
Route::post('/Ortho/Admin/Edit-Profile',[AdminController::class,'UpdateProfile'])->name('Admin.UpdateProfile');




// Doctor Dashboard Routes
Route::get('/Ortho/Doctor/Dashboard',[DoctorsController::class,'index'])->name('doctor.dashboard');
Route::get('/Ortho/Doctor/My-Profile',[DoctorsController::class,'profile'])->name('doctor.profile');
Route::get('/Ortho/Doctor/Edit-Profile',[DoctorsController::class,'Editprofile'])->name('doctor.profile.edit');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Auth Routes
Route::get('/home',[UserAuthController::class,'index'])->middleware(['auth']);
Route::get('/403-Forbidden',[UserAuthController::class,'statusblockError'])->name('statusblockError');