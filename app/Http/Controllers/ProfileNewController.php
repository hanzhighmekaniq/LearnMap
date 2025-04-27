<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class ProfileNewController extends Controller
{
    public function edit()
    {
        return view('login.edit-password');
    }

    public function update(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'current_password' => ['required'],
                'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            // Ambil user yang sedang login
            $user = Auth::user(); // ✅ Benar!
            // <-- PERBAIKAN: "user()" bukan "Users()"

            // Pastikan user ada
            if (!$user) {
                return back()->withErrors(['error' => 'User tidak ditemukan.']);
            }

            // Periksa apakah password lama sesuai
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password lama tidak sesuai!']);
            }

            // Cek apakah password baru sama dengan password lama
            if (Hash::check($request->new_password, $user->password)) {
                return back()->withErrors(['new_password' => 'Password baru tidak boleh sama dengan password lama!']);
            }

            // Update password dengan hashing
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Logout otomatis setelah perubahan password
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password berhasil diperbarui! Silakan login kembali.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika validasi gagal, tampilkan error spesifik
            return back()->withErrors($e->validator->errors());
        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Gagal memperbarui password: ' . $e->getMessage());

            // Tampilkan pesan error yang lebih spesifik ke user
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
