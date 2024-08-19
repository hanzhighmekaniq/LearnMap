<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTambahDataKursusController extends Controller
{
    public function create()
    {
        return view('admin.tambahDataKursusAdmin');
    }
}
