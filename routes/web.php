<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataKursusController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengunjungController;



// ADMIN
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.home'); // SHOW DASHBOARD
Route::get('/admin/data-kursus', [AdminDataKursusController::class, 'dataKursus'])->name('admin.dataKursus'); //SHOW DATA
Route::get('/admin/edit-kursus', [AdminDataKursusController::class, 'edit'])->name('admin.edit'); // SHOW TAMPILAN EDIT DATA
Route::post('/admin/store', [AdminDataKursusController::class, 'store'])->name('kursus.store'); // TOMBOL SIMPAN TAMBAH DATA
Route::get('/admin/createData', [AdminDataKursusController::class, 'create'])->name('admin.create'); // SHOW TAMPILAN TAMBAH DATA

Route::delete('/admin/delete/{id}', [AdminDataKursusController::class, 'destroy'])->name('delete');// TOMBOL DELETE DATA
// Route::update('/admin/update/{id}', [AdminDataKursusController::class, 'update'])->name('update');
Route::get('/admin/courses', [AdminDataKursusController::class, 'index']);

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');

// USER
Route::get('/', [PengunjungController::class, 'home'])->name('home'); // SHOW TAMPILAN AWAL
Route::get('/kursus', [PengunjungController::class, 'kursus'])->name('user.kursus'); //SHOW TAMPILAN SELURUH KHURSUS
Route::get('/kursus/search', [PengunjungController::class, 'search'])->name('user.kursus.search'); //SHOW TAMPILAN SELURUH KHURSUS

Route::get('/peta', [PengunjungController::class, 'maps'])->name('user.peta'); //SHOW PETA SELURUH TITIK KURSUS
Route::get('/kursus/rute', [PengunjungController::class, 'rute'])->name('user.rute'); //SHOW PETA SELURUH TITIK KURSUS
Route::get('/kursus/{id}/detail', [PengunjungController::class, 'detail'])->name('kursus.detail'); // DETAIL KHURSUS MASING"
