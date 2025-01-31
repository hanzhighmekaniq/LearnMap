<?php

namespace App\Http\Controllers;

use App\Models\PendingUser;
use App\Models\User;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function registStore(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|confirmed',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Mengecek apakah email sudah terdaftar dalam PendingUser yang belum diverifikasi
            $pendingUser = PendingUser::where('email', $request->email)->first();

            if ($pendingUser) {
                // Jika ada pengguna yang belum diverifikasi, kirim ulang email verifikasi
                if (!$pendingUser->email_verified_at) {
                    Notification::send($pendingUser, new EmailVerificationNotification($pendingUser));
                    return redirect()->route('cekEmail')->with('success', 'A verification email has been sent again. Please check your inbox.');
                } else {
                    return back()->with('success', 'This email is already verified, you can log in now.');
                }
            }

            // Mengecek apakah email sudah terdaftar di tabel User (sudah diverifikasi)
            $user = User::where('email', $request->email)->first();

            if ($user) {
                return back()->with('success', 'This email is already registered and verified, you can log in now.');
            }

            // Simpan pengguna baru ke tabel PendingUser jika tidak ada
            $pendingUser = PendingUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => null,
                'remember_token' => Str::random(10),
            ]);

            // Kirim email verifikasi
            Notification::send($pendingUser, new EmailVerificationNotification($pendingUser));

            return redirect()->route('cekEmail')->with('success', 'A verification email has been sent to your email address. Please check your inbox.');
        } catch (QueryException $e) {
            // Tangkap error untuk duplikasi data unik
            if ($e->getCode() === '23000') { // Kode 23000 adalah pelanggaran constraint
                return back()->with('error', 'Email sudah digunakan. Silakan gunakan email lain.')->withInput();
            }

            // Tangani error lain
            return back()->with('error', 'Terjadi kesalahan saat mendaftarkan akun. Silakan coba lagi.')->withInput();
        }
    }

    public function verifyEmail($id, $token)
    {
        // Find the pending user
        $pendingUser = PendingUser::where('id', $id)->where('remember_token', $token)->first();

        if (!$pendingUser) {
            return redirect()->route('login')->with('error', 'Invalid or expired verification link.');
        }

        // Pindahkan data ke tabel Users
        $user = User::create([
            'name' => $pendingUser->name,
            'email' => $pendingUser->email,
            'password' => $pendingUser->password,  // Password is already hashed
            'remember_token' => $pendingUser->remember_token,
            'email_verified_at' => now(),
        ]);


        return redirect()->route('login')->with('success', 'Your email has been verified, and your account is now active.');
    }

    public function cekEmail()
    {
        return view('login.verif');
    }

    public function resendVerification(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|exists:pending_users,email',
        ]);

        $pendingUser = PendingUser::where('email', $request->email)->first();

        if (!$pendingUser || $pendingUser->email_verified_at) {
            return back()->with('error', 'Email not found or already verified.');
        }

        // Kirim ulang email verifikasi
        Notification::send($pendingUser, new EmailVerificationNotification($pendingUser));

        return back()->with('success', 'Verification email has been resent successfully!');
    }
}
