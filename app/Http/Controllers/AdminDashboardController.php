<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKursus; // Pastikan model diimport

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data kursus
        $allLandingPages = DataKursus::all();

        // Ambil satu gambar secara acak untuk bagian atas
        $randomLandingPage = $allLandingPages->random();

        // Ambil maksimal 6 gambar secara acak untuk bagian bawah
        $randomLandingPages = $allLandingPages->random(min(count($allLandingPages), 6));

        return view('admin.dahsboard', [
            'randomLandingPage' => $randomLandingPage,
            'randomLandingPages' => $randomLandingPages,
            'allLandingPages' => $allLandingPages
        ]);
    }
}
