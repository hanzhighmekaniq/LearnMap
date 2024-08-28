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
        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil dihapus.');
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
    // Mengambil data dari tabel data_kursus
    $latilongti = DataKursus::all();

    // Mengirim data ke view 'user.peta'
    return view('user.peta', compact('latilongti'));
}

}
