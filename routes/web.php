<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataKursusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengunjungController;

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.home');
Route::get('/admin/data-kursus', [AdminDataKursusController::class, 'dataKursus'])->name('admin.dataKursus');
Route::get('/admin/tambahdata', [AdminDataKursusController::class, 'create'])->name('admin.tambahDataKursus');

Route::delete('/admin/delete/{id}', [AdminDataKursusController::class, 'destroy'])->name('delete');
Route::get('/admin/courses', [AdminDataKursusController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', [PengunjungController::class, 'home'])->name('home');
Route::get('/kursus', [PengunjungController::class, 'kursus'])->name('user.kursus');

Route::get('/peta', [PengunjungController::class, 'maps'])->name('user.peta');

Route::get('/kursus/{id}/detail', [PengunjungController::class, 'detail'])->name('kursus.detail');
