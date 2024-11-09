<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataKursusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengunjungController;


Route::middleware('auth')->group(function () {
    // ADMIN
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.home'); // SHOW DASHBOARD


Route::get('/admin/data-kursus', [AdminDataKursusController::class, 'dataKursus'])->name('admin.dataKursus'); //SHOW DATA
Route::get('/admin/create-data', [AdminDataKursusController::class, 'create'])->name('admin.create'); // SHOW TAMBAH DATA
Route::get('/admin/{id}/edit-kursus', [AdminDataKursusController::class, 'edit'])->name('admin.edit'); // SHOW EDIT DATA

// FUNGSI DI ADMIN
Route::put('/admin/update/{id}', [AdminDataKursusController::class, 'update'])->name('admin.update'); // TOMBOL EDIT DATA
Route::post('/admin/store', [AdminDataKursusController::class, 'store'])->name('kursus.store'); // TOMBOL TAMBAH DATA
Route::delete('/admin/delete/{id}', [AdminDataKursusController::class, 'destroy'])->name('delete'); // TOMBOL DELETE DATA

});

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login'); // SHOW LOGIN

// USER
Route::get('/beranda', [PengunjungController::class, 'home'])->name('user.home'); // SHOW TAMPILAN AWAL
Route::get('/kursus', [PengunjungController::class, 'kursus'])->name('user.kursus'); //SHOW TAMPILAN SELURUH KHURSUS
Route::get('/peta', [PengunjungController::class, 'maps'])->name('user.peta'); //SHOW PETA SELURUH TITIK KURSUS
Route::get('/kursus/{id}/rute', [PengunjungController::class, 'rute'])->name('user.rute'); //SHOW PETA SELURUH TITIK KURSUS
Route::get('/kursus/{id}/detail', [PengunjungController::class, 'detail'])->name('kursus.detail'); // DETAIL KHURSUS MASING"
