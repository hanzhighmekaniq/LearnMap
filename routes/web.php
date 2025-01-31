<?php

use App\Models\User;
use App\Models\PendingUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProfileNewController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDataKursusController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::get('/login', [LoginController::class, 'index'])->name('login'); // Halaman login
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process'); // Proses login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Proses logout


Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register-account', [RegisterController::class, 'registStore'])->name('register.account');
Route::get('verify-email/{id}/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');
Route::get('Cek-Email', [RegisterController::class, 'cekEmail'])->name('cekEmail');
Route::post('resend-verification', [RegisterController::class, 'resendVerification'])->name('verify.resend');

Route::get('forgot-password-index', [PasswordResetLinkController::class, 'create'])
    ->name('password.forget');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/email/verify/resend', [PasswordResetLinkController::class, 'showResendForm'])->name('verification.resend.form');
Route::post('/email/verify/resend', [PasswordResetLinkController::class, 'resend'])->name('verification.resend');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store');

// ADMIN
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.home');
    Route::get('/data-kursus', [AdminDataKursusController::class, 'dataKursus'])->name('admin.dataKursus');
    Route::get('/create-data', [AdminDataKursusController::class, 'create'])->name('admin.create');
    Route::get('/{id}/edit-kursus', [AdminDataKursusController::class, 'edit'])->name('admin.edit');

    // Fungsi di admin
    Route::put('/update/{id}', [AdminDataKursusController::class, 'update'])->name('admin.update');
    Route::post('/store', [AdminDataKursusController::class, 'store'])->name('kursus.store');
    Route::delete('/delete/{id}', [AdminDataKursusController::class, 'destroy'])->name('delete');
    Route::resource('kategori', KategoriController::class);
});


// USER
Route::get('/', [PengunjungController::class, 'home'])->name('user.home');
Route::get('/gagal-login', [PengunjungController::class, 'gagal'])->name('gagal.home');
Route::get('/kursus', [PengunjungController::class, 'kursus'])->name('user.kursus');
Route::get('/peta', [PengunjungController::class, 'maps'])->name('user.peta');
Route::get('/kursus/{id}/rute', [PengunjungController::class, 'rute'])->name('user.rute');
Route::get('/kursus/{id}/detail', [PengunjungController::class, 'detail'])->name('kursus.detail');
Route::post('/store-ulasan', [PengunjungController::class, 'storeUlasann'])->name('storeUlasan');


Route::middleware(['auth'])->group(function () {
    Route::get('/password/edit', [ProfileNewController::class, 'edit'])->name('password.edit');
    Route::put('/password/update', [ProfileNewController::class, 'update'])->name('password.update'); // Ubah dari POST ke PUT
});


require __DIR__ . '/auth.php';
