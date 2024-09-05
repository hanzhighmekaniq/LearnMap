<?php

namespace App\Http\Controllers;

use App\Models\DataKursus; // Pastikan model diimport
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

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
        try {
            $validator = Validator::make($request->all(), [
                'nama_kursus' => 'required',
                'img' => 'required|file|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'required',
                'paket' => 'required',
                'metode' => 'required',
                'fasilitas' => 'required',
                'lokasi' => 'required',
                'latitude' => 'required|numeric|between:-180,180',
                'longitude' => 'required|numeric|between:-180,180',
                'img_konten.*' => 'file|mimes:jpeg,png,jpg|max:2048',
            ]);

            // if ($validator->fails()) {
            //     return redirect()->back()->withInput()->withErrors($validator);
            // }
            $imgPath = $request->file('img')->store('konten', 'public');
            $imgKontenPaths = [];
            if ($request->hasFile('img_konten')) {
                foreach ($request->file('img_konten') as $file) {
                    $imgKontenPaths[] = $file->store('logo', 'public');
                }
            }

            // Simpan data ke dalam database
            $result = DataKursus::create([
                'nama_kursus' => $request->nama_kursus,
                'img' => $imgPath,
                'deskripsi' => $request->deskripsi,
                'paket' => $request->paket,
                'metode' => $request->metode,
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'img_konten' => json_encode($imgKontenPaths),
            ]);

            return redirect('/admin/data-kursus');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit()
    {
        return view('admin.ubahDataKursusAdmin');
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
