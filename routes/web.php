<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataKursusController;
use App\Http\Controllers\LoginController;



Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.home');
Route::get('/admin/data-kursus', [AdminDataKursusController::class, 'dataKursus'])->name('admin.dataKursus');
Route::get('/admin/tambahdata', [AdminDataKursusController::class, 'create'])->name('admin.tambahDataKursus');

Route::delete('/admin/delete/{id}', [AdminDataKursusController::class, 'destroy'])->name('delete');

Route::get('/admin/courses', [AdminDataKursusController::class, 'index']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'login'])->name('login.post');


Route::get('/', [AdminDataKursusController::class, 'home'])->name('home');
Route::get('/kursus', [AdminDataKursusController::class, 'kursus'])->name('user.kursus'); // Perbaikan pada rute ini
Route::get('/peta', [AdminDataKursusController::class, 'maps'])->name('user.peta');

Route::get('/detailkursus', [AdminDataKursusController::class, 'detail'])->name('user.detailKursus');



