<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController; 
use App\Http\Controllers\User\UserController; 
use App\Http\Controllers\Admin\AdminController; 
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\ProductController; 

Route::get('/', function () {
    return view('a');
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
    Route::controller(AdminController::class)->group(function () {

    Route::get('/admin', 'index')->name('admin.dashboard');

    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category', 'category')->name('admin.category');
        Route::post('/add',  'store')->name('action.category.add');
        Route::post('/update',  'update')->name('action.category.update');
        Route::post('/delete',  'delete')->name('action.category.delete');

    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'product')->name('admin.product');
        Route::post('/add/product', 'store')->name('action.product.add');
        Route::post('/update/product', 'update')->name('action.product.update');
        Route::post('/delete/product', 'delete')->name('action.product.delete');


    });
});