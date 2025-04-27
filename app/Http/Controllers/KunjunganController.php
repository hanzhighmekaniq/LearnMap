<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use App\Models\DataKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KunjunganController extends Controller
{
    // Fungsi untuk mencatat kunjungan
    public function visitCourse(Request $request, $kursus_id)
    {
        // Ambil IP pengguna secara otomatis dari request
        $ip_user = $request->ip();

        // Cari kursus berdasarkan ID
        $kursus = DataKursus::find($kursus_id);

        if (!$kursus) {
            return response()->json([
                'status' => 'error',
                'message' => 'Course not found',
            ], 404);
        }

        // Cek apakah IP pengguna sudah mengunjungi kursus ini pada hari ini
        $today = now()->format('Y-m-d'); // Ambil tanggal hari ini dalam format Y-m-d

        $existingVisit = Kunjungan::where('ip_user', $ip_user)
            ->where('kursus_id', $kursus_id)
            ->whereDate('created_at', $today) // Cek berdasarkan tanggal
            ->first();

        if ($existingVisit) {
            return response()->json([
                'status' => 'info',
                'message' => 'You have already visited this course today.',
            ], 200);
        }

        // Jika belum ada kunjungan, buat data kunjungan baru
        try {
            $kunjungan = Kunjungan::create([
                'ip_user' => $ip_user,
                'kursus_id' => $kursus_id,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Successfully recorded visit.',
                'data' => $kunjungan
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to record visit: ' . $e->getMessage(),
            ], 500);
        }
    }
}
