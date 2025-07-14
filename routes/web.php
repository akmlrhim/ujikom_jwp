<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

// Route::redirect('/', 'student');

Route::resource('student', StudentController::class);
