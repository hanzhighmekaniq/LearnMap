<?php

namespace App\Http\Controllers;

use App\Models\DataKursus; // Pastikan model diimport
use Illuminate\Http\Request;

class AdminDataKursusController extends Controller
{
    public function index()
    {
        $courses = DataKursus::all();
        return view('admin.dataKursusAdmin', ['courses' => $courses]);
    }

    public function create(){
        return view('admin.tambahDataKursusAdmin');
    }

    public function detail(){
            
    }

}
