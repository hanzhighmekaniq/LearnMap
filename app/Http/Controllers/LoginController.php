<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login'); // Tampilkan halaman login
    }

    public function authenticate(Request $request)
    {
        // Validasi input (login bisa berupa email atau username, dan password)
        $credentials = $request->validate([
            'login' => ['required'],  // Input login (email atau username)
            'password' => ['required'],
        ]);

        // Ambil nilai "remember" dari request (default false jika tidak dicentang)
        $remember = $request->has('remember');

        // Logout pengguna lama untuk mencegah konflik sesi
        Auth::logout();

        // Cek apakah input login berupa email atau username
        $user = null;
        if (filter_var($credentials['login'], FILTER_VALIDATE_EMAIL)) {
            // Jika input adalah email, cari berdasarkan email
            $user = \App\Models\User::where('email', $credentials['login'])->first();
        } else {
            // Jika input adalah username, cari berdasarkan username
            $user = \App\Models\User::where('username', $credentials['login'])->first();
        }

        // Cek apakah pengguna ditemukan
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Jika password cocok, login
            Auth::login($user, $remember);
            $request->session()->regenerate();

            // Ambil role user yang sedang login
            $role = Auth::user()->role;

            // Simpan status login sesuai dengan role
            if ($role === 'admin') {
                session(['is_admin_logged_in' => true]); // Status admin
                return redirect()->route('admin.home');
            }

            if ($role === 'user') {
                session(['is_user_logged_in' => true]); // Status user
                return redirect()->route('user.home'); // Redirect ke halaman user
            }

            if ($role === 'pengunjung') {
                session(['is_pengunjung_logged_in' => true]); // Status pengunjung
                return redirect()->route('user.home'); // Redirect ke halaman pengunjung
            }
        }

        // Jika gagal login, kembali dengan error
        return back()->withErrors([
            'login' => 'Email/Username atau password salah.',
        ]);
    }






    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
