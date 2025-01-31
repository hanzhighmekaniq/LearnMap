<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login'); // Tampilkan halaman login
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Ambil nilai "remember" dari request (default false jika tidak dicentang)
        $remember = $request->has('remember');

        // Coba autentikasi dengan kredensial dan parameter "remember"
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            // Periksa role dan arahkan sesuai dengan role
            $role = Auth::user()->role;

            if ($role === 'admin') {
                session(['is_pengunjung_logged_in' => true]); // Menyimpan status pengunjung dalam sesi
                return redirect()->route('admin.home');
            }

            // Jika pengunjung, simpan sesi dan arahkan ke halaman depan
            if ($role === 'pengunjung') {
                session(['is_pengunjung_logged_in' => true]); // Menyimpan status pengunjung dalam sesi
                return redirect()->route('user.home');
            }
        }

        // Jika gagal login, kembali dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
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
