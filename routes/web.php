<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Doctor\DoctorController;
use App\Http\Controllers\Admin\Patient\PatientController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\FAQs\FAQController;
use App\Http\Controllers\Admin\Subscription\SubscriptionController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\Course\ChapterController;
use App\Http\Controllers\Admin\NewsLetter\NewsLetterController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\Doctor\DoctorsController;
use App\Http\Controllers\Doctor\DoctorWorkingTimeController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Doctor\DoctorPatientController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\TempController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



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
Route::get('/Ortho/Blog-Detail/{slug}',[HomeController::class,'blogDetail'])->name('User.blogDetail');
Route::get('/Ortho/Doctor-Detail/{id}',[HomeController::class,'DoctorDetail'])->name('User.DoctorDetail');
Route::get('/Ortho/Service-Detail/{slug}',[HomeController::class,'serviceDetail'])->name('User.serviceDetail');
Route::get('/Ortho/Course-Detail/{slug}',[HomeController::class,'CourseDetail'])->name('User.CourseDetail');
Route::get('/Ortho/FAQs',[HomeController::class,'faq'])->name('User.faq');
Route::get('/Ortho/Privacy-Policy',[HomeController::class,'privacy'])->name('User.privacy');
Route::get('/Ortho/404',[HomeController::class,'error'])->name('User.error');
Route::get('/Ortho/Booking-Appionment/{id}',[HomeController::class,'apoinment'])->name('User.apoinment');
Route::get('/Ortho/Doctor-Registration',[HomeController::class,'DoctorRegistration'])->name('User.doctorRegiestraion');
Route::post('/Ortho/Send-Doctor-Registration-Request',[DoctorController::class,'DoctorRegiestration'])->name('User.DoctorRegiestrationRequest');
Route::post('/Ortho/Get-Doctor-Appoinment-Time',[AppoinmentController::class,'GetTime'])->name('User.appoinment.GetTime');
Route::post('/Ortho/Book-Doctor-Appoinment',[AppoinmentController::class,'Store'])->name('User.appoinment.book');



// User Dashboard Routes

Route::get('/Ortho/Dashboard',[DashboardController::class,'dashboard'])->name('User.dashboard.dashboard');
Route::get('/Ortho/Dashboard/My-Profile',[DashboardController::class,'profile'])->name('User.dashboard.profile');
Route::get('/Ortho/Dashboard/Update-Profile',[DashboardController::class,'Editprofile'])->name('User.dashboard.edit-profile');
Route::get('/Ortho/Dashboard/My-Appointment',[DashboardController::class,'appoinment'])->name('User.dashboard.appoinment');
Route::get('/Ortho/Dashboard/Appointment-Detail/{id}',[DashboardController::class,'AppoinmentDetail'])->name('User.dashboard.appoinment.show');
Route::post('/Ortho/Send-Contact-Message',[ContactController::class,'store'])->name('User.contact.send');
Route::post('/Ortho/Send-NewsLetter-Email',[NewsLetterController::class,'store'])->name('User.newsletter.send');
Route::post('/Ortho/Update-Profile',[DashboardController::class,'UpdateProfile'])->name('User.UpdateProfile');
Route::post('/Ortho/Update-Profile-Image',[DashboardController::class,'UpdateProfileImg'])->name('User.UpdateProfileImage');
Route::post('/Ortho/Change-Password',[DashboardController::class,'ChangePassword'])->name('User.ChangePassword');
Route::get('/Ortho/404-Not-Found',[DashboardController::class,'error'])->name('User.dashboard.error');
Route::post('/Ortho/User-Cancelled-Appointment',[AppoinmentController::class,'UserCancelAppointment'])->name('User.appointment.cancel');
Route::post('/Ortho/Send-Blog-Comment',[BlogController::class,'StoreBlogComment'])->name('User.blog.comment.store');




// Admin Dashboard Routes
Route::get('/Ortho/Admin/Dashboard',[AdminController::class,'dashboard'])->name('Admin.dashboard');
Route::get('/Ortho/Admin/Profile',[AdminController::class,'Profile'])->name('Admin.profile');
Route::get('/Ortho/Admin/Update-Profile',[AdminController::class,'EditProfile'])->name('Admin.profile.edit');
Route::get('/Ortho/Admin/All-Doctors',[DoctorController::class,'doctor'])->name('Admin.doctor');
Route::get('/Ortho/Admin/Doctor-Profile/{id}',[DoctorController::class,'profile'])->name('Admin.doctor.profile');
Route::post('/Ortho/Admin/Doctor-Change-Status/',[DoctorController::class,'ChangeStatus'])->name('Admin.doctor.ChangeStatus');
Route::delete('/Ortho/Admin/Doctor-Account-Delete/',[DoctorController::class,'Delete'])->name('Admin.doctor.DeleteAccount');
Route::get('/Ortho/Admin/Doctor-Registration-Requests',[DoctorController::class,'request'])->name('Admin.doctor.request');
Route::get('/Ortho/Admin/Doctor-Request-Profile/{id}',[DoctorController::class,'requestProfile'])->name('Admin.doctor.request-profile');
Route::post('/Ortho/Admin/Doctor-Request-Status',[DoctorController::class,'requestProfileStatus'])->name('Admin.doctor.RequestChangeStatus');
Route::delete('/Ortho/Admin/Doctor-Request-Delete',[DoctorController::class,'requestDelete'])->name('Admin.doctor.RequestDelete');
Route::get('/Ortho/Admin/All-Patients',[PatientController::class,'index'])->name('Admin.patients');
Route::get('/Ortho/Admin/Patient-Profile/{id}',[PatientController::class,'profile'])->name('Admin.patients.profile');
Route::get('/Ortho/Admin/Change-Patient-Status/{id}',[PatientController::class,'status'])->name('Admin.patients.statusChange');
Route::delete('/Ortho/Admin/Delete-Patient/{id}',[PatientController::class,'delete'])->name('Admin.patients.DeletePatient');
Route::get('/Ortho/Admin/All-Blogs',[BlogController::class,'blog'])->name('Admin.blog');
Route::get('/Ortho/Admin/Blog-Detail/{slug}',[BlogController::class,'detail'])->name('Admin.blog.detail');
Route::get('/Ortho/Admin/Create-Blog',[BlogController::class,'create'])->name('Admin.blog.create');
Route::get('/Ortho/Admin/Edit-Blog/{slug}',[BlogController::class,'edit'])->name('Admin.blog.edit');
Route::get('/Ortho/Admin/Create-Blog',[BlogController::class,'create'])->name('Admin.blog.create');
Route::get('/Ortho/Admin/All-Services',[ServiceController::class,'index'])->name('Admin.service');
Route::get('/Ortho/Admin/Service-Detail/{slug}',[ServiceController::class,'show'])->name('Admin.service.detail');
Route::get('/Ortho/Admin/Create-Service',[ServiceController::class,'create'])->name('Admin.service.create');
Route::post('/Ortho/Admin/Store-Service',[ServiceController::class,'store'])->name('Admin.service.store');
Route::get('/Ortho/Admin/Edit-Service/{slug}',[ServiceController::class,'edit'])->name('Admin.service.edit');
Route::post('/Ortho/Admin/Update-Service/{id}',[ServiceController::class,'update'])->name('Admin.service.update');
Route::delete('/Ortho/Admin/Delete-Service',[ServiceController::class,'destroy'])->name('Admin.service.delete');
Route::get('/Ortho/Admin/All-FAQs',[FAQController::class,'index'])->name('Admin.FAQ');
Route::get('/Ortho/Admin/Create-FAQ',[FAQController::class,'create'])->name('Admin.FAQ.create');
Route::post('/Ortho/Admin/Store-FAQ',[FAQController::class,'store'])->name('Admin.FAQ.store');
Route::get('/Ortho/Admin/Edit-FAQ/{slug}',[FAQController::class,'edit'])->name('Admin.FAQ.edit');
Route::get('/Ortho/Admin/Show-FAQ/{slug}',[FAQController::class,'show'])->name('Admin.FAQ.show');
Route::post('/Ortho/Admin/Update-FAQ/{id}',[FAQController::class,'update'])->name('Admin.FAQ.update');
Route::delete('/Ortho/Admin/Delete-FAQ',[FAQController::class,'destroy'])->name('Admin.FAQ.delete');
Route::get('/Ortho/Admin/All-Subscriptions',[SubscriptionController::class,'index'])->name('Admin.subscripion');
Route::get('/Ortho/Admin/Create-Subscription',[SubscriptionController::class,'create'])->name('Admin.subscripion.create');
Route::post('/Ortho/Admin/Store-Subscription',[SubscriptionController::class,'store'])->name('Admin.subscripion.store');
Route::get('/Ortho/Admin/Edit-Subscription/{slug}',[SubscriptionController::class,'edit'])->name('Admin.subscripion.edit');
Route::post('/Ortho/Admin/Update-Subscription/{id}',[SubscriptionController::class,'update'])->name('Admin.subscripion.update');
Route::delete('/Ortho/Admin/Delete-Subscription',[SubscriptionController::class,'destroy'])->name('Admin.subscripion.delete');
Route::get('/Ortho/Admin/Subscribe-Patients',[SubscriptionController::class,'show'])->name('Admin.subscripion.subscriber');
Route::post('/Ortho/Admin/Change-Password',[AdminController::class,'ChangePassword'])->name('Admin.ChangePassword');
Route::post('/Ortho/Admin/Edit-Profile',[AdminController::class,'UpdateProfile'])->name('Admin.UpdateProfile');
Route::post('/Ortho/Admin/Edit-Profile-Image',[AdminController::class,'ProfileImg'])->name('Admin.UpdateProfileImage');
Route::get('/Ortho/Admin/404-Not-Found',[AdminController::class,'notFound'])->name('Admin.notFound');
Route::get('/Ortho/Admin/All-Contact-Messages',[ContactController::class,'index'])->name('Admin.contact.index');
Route::get('/Ortho/Admin/Contact-Message/{id}',[ContactController::class,'show'])->name('Admin.contact.show');
Route::post('/Ortho/Admin/Send-Reply-Message/',[ContactController::class,'sendReply'])->name('Admin.contact.sendReply');
Route::delete('/Ortho/Admin/Delete-Contact-Message/',[ContactController::class,'delete'])->name('Admin.contact.delete');
Route::get('/Ortho/Admin/All-Courses',[CourseController::class,'index'])->name('Admin.course');
Route::get('/Ortho/Admin/Create-Course',[CourseController::class,'create'])->name('Admin.course.create');
Route::post('/Ortho/Admin/Store-Course',[CourseController::class,'store'])->name('Admin.course.store');
Route::get('/Ortho/Admin/Show-Course/{slug}',[CourseController::class,'show'])->name('Admin.course.show');
Route::get('/Ortho/Admin/Edit-Course/{slug}',[CourseController::class,'edit'])->name('Admin.course.edit');
Route::post('/Ortho/Admin/Update-Course/{id}',[CourseController::class,'update'])->name('Admin.course.update');
Route::delete('/Ortho/Admin/Delete-Course',[CourseController::class,'destroy'])->name('Admin.course.delete');
Route::get('/Ortho/Admin/Course/Add-Chapter/{slug}',[ChapterController::class,'create'])->name('Admin.course.chapter.create');
Route::post('/Ortho/Admin/Course/Add-Chapter/{id}',[ChapterController::class,'store'])->name('Admin.course.chapter.store');
Route::get('/Ortho/Admin/Course/Edit-Chapter/{slug}',[ChapterController::class,'edit'])->name('Admin.course.chapter.edit');
Route::post('/Ortho/Admin/Course/Update-Chapter/{id}',[ChapterController::class,'update'])->name('Admin.course.chapter.update');
Route::delete('/Ortho/Admin/Course/Delete-Chapter/',[ChapterController::class,'destroy'])->name('Admin.course.chapter.delete');
Route::get('/Ortho/Admin/All-NewsLetter-Emails',[NewsLetterController::class,'index'])->name('Admin.newsletter');



//Admin Blog Routes

Route::post('Ortho/Admin/Store-Blog',[BlogController::class,'store'])->name('Store-Blog');
Route::post('Ortho/Admin/Update-Blog/{id}',[BlogController::class,'update'])->name('Update-Blog');
Route::delete('Ortho/Admin/Delete-Blog',[BlogController::class,'delete'])->name('Delete-Blog');
Route::post('Ortho/Admin/Change-Blog-Comment-Status',[BlogController::class,'BlogCommentStatus'])->name('Blog.comment.status');
Route::delete('Ortho/Admin/Delete-Blog-Comment',[BlogController::class,'BlogCommentDelete'])->name('Blog.comment.delete');


// Doctor Dashboard Routes
Route::get('/Ortho/Doctor/404-Not-Found',[DoctorsController::class,'notFound'])->name('doctor.notfound');
Route::get('/Ortho/Doctor/Dashboard',[DoctorsController::class,'index'])->name('doctor.dashboard');
Route::get('/Ortho/Doctor/My-Profile',[DoctorsController::class,'profile'])->name('doctor.profile');
Route::get('/Ortho/Doctor/Edit-Profile',[DoctorsController::class,'Editprofile'])->name('doctor.profile.edit');
Route::post('/Ortho/Doctor/Update-Profile',[DoctorsController::class,'UpdateProfile'])->name('doctor.profile.update');
Route::post('/Ortho/Doctor/Update-Profile-Image',[DoctorsController::class,'UpdateProfileImg'])->name('doctor.profile.update.img');
Route::post('/Ortho/Doctor/Change-Password',[DoctorsController::class,'ChangePassword'])->name('doctor.ChangePassword');
Route::post('/Ortho/Doctor/Change-Account-Status',[DoctorsController::class,'ChangeAccountStatus'])->name('doctor.ChangeAccountStatus');
Route::get('/Ortho/Doctor/All-Schedules',[DoctorWorkingTimeController::class,'index'])->name('doctor.schedules');
Route::get('/Ortho/Doctor/Add-Schedule',[DoctorWorkingTimeController::class,'create'])->name('doctor.schedules.create');
Route::post('/Ortho/Doctor/Create-Schedule',[DoctorWorkingTimeController::class,'store'])->name('doctor.schedules.store');
Route::get('/Ortho/Doctor/Edit-Schedule/{id}',[DoctorWorkingTimeController::class,'edit'])->name('doctor.schedules.edit');
Route::post('/Ortho/Doctor/Update-Schedule/{id}',[DoctorWorkingTimeController::class,'update'])->name('doctor.schedules.update');
Route::delete('/Ortho/Doctor/Delete-Schedule',[DoctorWorkingTimeController::class,'destroy'])->name('doctor.schedules.delete');
Route::get('/Ortho/Doctor/All-Appointments',[AppoinmentController::class,'index'])->name('doctor.Appointments');
Route::get('/Ortho/Doctor/Appointment-Detail/{id}',[AppoinmentController::class,'show'])->name('doctor.Appointment.show');
Route::post('/Ortho/Doctor/Change-Appointment-Status',[AppoinmentController::class,'changeStatus'])->name('doctor.Appointment.changeStatus');
Route::post('/Ortho/Doctor/Cancelled-Appointment',[AppoinmentController::class,'Cancel'])->name('doctor.Appointment.Cancel');
Route::get('/Ortho/Doctor/All-Patients',[DoctorPatientController::class,'index'])->name('doctor.Patients');
Route::get('/Ortho/Doctor/Patient-Profile/{id}',[DoctorPatientController::class,'profile'])->name('doctor.Patients.profile');



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


// Other Routes
Route::get('/home',[UserAuthController::class,'index'])->middleware(['auth']);
Route::get('/Ortho/403-Forbidden',[UserAuthController::class,'statusblockError'])->name('statusblockError');
Route::post('/Ortho/Temp-Images',[TempController::class,'image'])->name('TempImages');
Route::post('/Ortho/Temp-Files',[TempController::class,'file'])->name('TempFiles');

Route::get('Admin/getSlug', function (Request $request) {

    $slug = '';
    if (!empty($request->title)) {
      $slug = Str::slug($request->title);
    }
    return response()->json([
      'status' => true,
      'slug' => $slug,
    ]);
  })->name('GetSlug');