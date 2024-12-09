<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController; // Import SessionController

// Home Route
Route::view('/', 'home')->name('home');

// Job Routes
Route::resource('jobs', JobListingController::class)
    ->middleware('auth'); //  job routes require authentication

// Route to add a contact page
Route::view('/contact', 'contact')->name('contact');

// Authentication Routes for Registration
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Authentication Routes for Login
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');
