<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KategoriPenghasilanController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\PenghasilanController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::redirect('/', 'beranda');

Route::resource('student', StudentController::class);

Route::get('beranda', [BerandaController::class, 'index'])->name('beranda');
Route::resource('kategori_penghasilan', KategoriPenghasilanController::class);
Route::resource('penghasilan', PenghasilanController::class)->except(['show']);
Route::get('penghasilan/export', [PenghasilanController::class, 'export'])->name('penghasilan.export');
