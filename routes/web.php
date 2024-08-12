<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController; 
use App\Http\Controllers\User\UserController; 
use App\Http\Controllers\Admin\AdminController; 

Route::get('/', function () {
    return view('login');
});


Route::get('/verify-otp', function () {
    return view('verify-otp'); 
})->name('verifyotp');


Route::get('/registration-success', function () {
    return view('registration-success'); 
})->name('registration-success');


Route::controller(AuthController::class)->group(function () {
    Route::get('/verify-sms',  'showSmsForm')->name('verifySms');
    Route::post('/verify',  'verifySms')->name('SendSms');
    Route::post('/register',  'register')->name('register');
    Route::post('/verify-otp',  'verifyOtp')->name('verifyotp.post');
    Route::get('/login',  'showlogin')->name('login');
    Route::post('/login/action',  'login')->name('action.login');
});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/user', 'index')->name('user.dashboard');
    });
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});