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

}
