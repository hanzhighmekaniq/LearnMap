<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataKursusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengunjungController;



// ADMIN

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.home');
Route::get('/admin/data-kursus', [AdminDataKursusController::class, 'dataKursus'])->name('admin.dataKursus');
Route::get('/admin/edit-kursus', [AdminDataKursusController::class, 'edit'])->name('admin.edit');
Route::post('/admin/store', [AdminDataKursusController::class, 'store'])->name('kursus.store');
Route::get('/admin/createData', [AdminDataKursusController::class, 'create'])->name('admin.create');
Route::delete('/admin/delete/{id}', [AdminDataKursusController::class, 'destroy'])->name('delete');
// Route::update('/admin/update/{id}', [AdminDataKursusController::class, 'update'])->name('update');
Route::get('/admin/courses', [AdminDataKursusController::class, 'index']);

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/', [PengunjungController::class, 'home'])->name('home');
Route::get('/kursus', [PengunjungController::class, 'kursus'])->name('user.kursus');

Route::get('/peta', [PengunjungController::class, 'maps'])->name('user.peta');

Route::get('/kursus/{id}/detail', [PengunjungController::class, 'detail'])->name('kursus.detail');

