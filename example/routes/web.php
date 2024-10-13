<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // Ensure this points to home.blade.php
});
