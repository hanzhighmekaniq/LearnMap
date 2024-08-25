<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDetailDataKursusController extends Controller
{
    public function index()
    {
        $courses = DataKursus::all(); // Mengambil semua data dari tabel data_kursus
        return view('user.detailKursus', compact('courses')); // Mengirim data ke view
    }
}
