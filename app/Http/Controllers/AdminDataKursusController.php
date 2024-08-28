<?php

namespace App\Http\Controllers;

use App\Models\DataKursus; // Pastikan model diimport
use Illuminate\Http\Request;

class AdminDataKursusController extends Controller
{

    // ADMIN FADIAS TUKANG SERVER
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

    public function destroy(string $id)
    {
        $data = DataKursus::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil dihapus.');
    }


    // PENGUNJUNG
    public function home()
    {
        $landingpage = DataKursus::inRandomOrder()->limit(3)->get();
        return view('user.home', compact('landingpage'));
    }


    public function kursus()
    {
        $data_kursus = DataKursus::limit(6)->get();
        return view('user.kursus', compact('data_kursus'));
    }
    public function detail()
    {
        return view('user.detailKursus');
    }


    public function maps()
    {
        $latilongti = DataKursus::all();
        return view('user.peta', compact('latilongti'));
    }
}
