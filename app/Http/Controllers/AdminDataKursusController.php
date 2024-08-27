<?php

namespace App\Http\Controllers;

use App\Models\DataKursus; // Pastikan model diimport
use Illuminate\Http\Request;

class AdminDataKursusController extends Controller
{
    public function dataKursus()
    {
        $courses = DataKursus::all();
        return view('admin.dataKursusAdmin', ['courses' => $courses]);
    }

    public function create()
    {
        return view('admin.tambahDataKursusAdmin');
    }

    public function store(Request $request)
    {
        $request->validate(
            []
        );
    }

    public function detail()
    {
        $courses = DataKursus::all();
        return view('user.detailKursus', compact('courses'));
    }

    public function destroy(string $id)
    {
        $data = DataKursus::find($id);
        $data->delete();
    }

    public function home()
    {
        return view('user.home');
    }
    public function kursus()
    {
        return view('user.kursus');
    }
    public function maps()
    {
        return view('user.peta');
    }
}
