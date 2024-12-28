<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;

Route::get('/d', function () {
    return view('welcome');
});



// User Routes

Route::get('/',[HomeController::class,'index'])->name('User.index');
