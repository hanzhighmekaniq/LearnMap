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

        // Pastikan ada data sebelum mencoba mengambil item acak
        $randomLandingPage = $allLandingPages->isEmpty() ? null : $allLandingPages->random();
        $randomLandingPages = $allLandingPages->isEmpty() ? collect() : $allLandingPages->random(min($allLandingPages->count(), 5));

        return view('admin.dashboard', [ // Pastikan nama view sesuai dengan yang Anda gunakan
            'randomLandingPage' => $randomLandingPage,
            'randomLandingPages' => $randomLandingPages,
            'allLandingPages' => $allLandingPages
        ]);
    }
}
