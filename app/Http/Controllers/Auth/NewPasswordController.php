<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validasi input
            $request->validate([
                'token' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // Reset password
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($user));
                }
            );

            // Cek status reset password
            if ($status == Password::PASSWORD_RESET) {
                return redirect()->route('login')->with('success', __('Password berhasil direset! Silakan login.'));
            } else {
                return back()->withInput($request->only('email'))
                    ->withErrors(['email' => __($status)]);
            }
        } catch (\Throwable $e) {
            // Log error untuk debugging
            Log::error('Password reset failed: ' . $e->getMessage());

            return back()->withInput($request->only('email'))
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
