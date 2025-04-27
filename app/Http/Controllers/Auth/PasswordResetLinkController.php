<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class PasswordResetLinkController extends Controller
{
    // Menampilkan halaman form forgot password
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    // Menangani request pengiriman link reset password
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validasi email
            $request->validate([
                'email' => ['required', 'email'],
            ]);

            // Kirimkan link reset password
            $status = Password::sendResetLink(
                $request->only('email')
            );

            // Menampilkan pesan sesuai status
            if ($status == Password::RESET_LINK_SENT) {
                return back()->with('success', 'Link reset password telah dikirim ke email Anda.');
            } else {
                return back()->withErrors(['email' => 'Gagal mengirim link reset password.']);
            }
        } catch (\Throwable $e) {
            Log::error('Gagal mengirim reset password: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    // Menampilkan halaman form reset password
    public function showResetForm($token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    // Mengupdate password setelah reset
    public function reset(Request $request): RedirectResponse
    {
        try {
            // Validasi input
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', 'min:8'],
                'token' => ['required'],
            ]);

            // Cek apakah token valid
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    // Update password user
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );

            // Status setelah reset
            if ($status == Password::PASSWORD_RESET) {
                return redirect()->route('login')->with('success', 'Password berhasil direset! Silakan login.');
            } else {
                return back()->withErrors(['email' => __($status)]);
            }
        } catch (\Throwable $e) {
            Log::error('Gagal mengupdate password: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
