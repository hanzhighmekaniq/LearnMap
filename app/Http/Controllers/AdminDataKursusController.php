<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDataKursusController extends Controller
{
    public function index()
    {
        return view('admin.dataKursusAdmin');
    }
}
