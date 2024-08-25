<?php

namespace App\Http\Controllers;

use App\Models\DataKursus; // Pastikan model diimport
use Illuminate\Http\Request;

class AdminDataKursusController extends Controller
{
    public function index()
    {
        $courses = DataKursus::all(); // Mengambil semua data dari tabel data_kursus
        return view('admin.dataKursusAdmin', ['courses' => $courses]); // Mengirim data ke view
    }
}
