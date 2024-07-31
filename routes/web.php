<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


route::get('/home',[MainController::class,'requirement'])->name('home');

route::post('/registeruser',[MainController::class,'registeruser'])->name('registeruser');
route::get('/login',[MainController::class,'login'])->name('login');
route::post('/loginuser',[MainController::class,'loginuser'])->name('loginuser');
route::get('/logout',[MainController::class,'logout'])->name('logout');




route::get('/admin',[AdminController::class,'index'])->name('admin');
route::get('/users',[AdminController::class,'users'])->name('users');
route::get('/applicant',[AdminController::class,'applicant'])->name('applicant');
// routes/web.php
Route::post('/update-recruiter', [AdminController::class, 'updateRecruiter'])->name('updateRecruiter');
// routes/web.php
Route::post('/update-applicant-field', [AdminController::class, 'updateApplicantField'])->name('updateApplicantField');





