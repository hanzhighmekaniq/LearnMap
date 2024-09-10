<?php

namespace App\Http\Controllers;

use App\Models\DataKursus; // Pastikan model diimport
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Strings;
use PhpParser\Node\Expr\Cast\String_;
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
            // Perbarui aturan validasi
            $validator = Validator::make($request->all(), [
                'nama_kursus' => 'required',
                'img' => 'required|file|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'required',
                'paket' => 'required',
                'metode' => 'required',
                'fasilitas' => 'required',
                'lokasi' => 'required',
                'latitude' => 'nullable', // Ubah aturan validasi
                'longitude' => 'nullable', // Ubah aturan validasi
                'img_konten.*' => 'file|mimes:jpeg,png,jpg|max:2048',
            ]);

            // Cek apakah validasi gagal
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Menyimpan file gambar utama
            $imgPath = $request->file('img')->store('konten', 'public');
            $imgKontenPaths = [];

            // Menyimpan file gambar konten
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
                'latitude' => $request->latitude, // Menyimpan nilai latitude bebas
                'longitude' => $request->longitude, // Menyimpan nilai longitude bebas
                'img_konten' => json_encode($imgKontenPaths),
            ]);

            // Redirect setelah berhasil
            return redirect('/admin/data-kursus')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            // Tangani kesalahan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        // Ambil record DataKursus berdasarkan ID-nya
        $dataKursus = DataKursus::findOrFail($id);

        // Decode field JSON untuk nama gambar jika ada
        $imageName = $dataKursus->img_konten ? json_decode($dataKursus->img_konten, true) : [];

        // Kirim data ke view
        return view('admin.ubahDataKursusAdmin', compact('dataKursus', 'imageName'));
    }

    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_kursus' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'img_konten.*' => 'nullable|image|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'nullable|numeric',
            'paket' => 'nullable|string',
            'metode' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'lokasi' => 'nullable|string',
        ]);

        // Ambil record DataKursus berdasarkan ID-nya
        $dataKursus = DataKursus::findOrFail($id);

        // Update fields
        $dataKursus->nama_kursus = $request->input('nama_kursus');
        $dataKursus->deskripsi = $request->input('deskripsi');
        $dataKursus->latitude = $request->input('latitude');
        $dataKursus->longitude = $request->input('longitude');
        $dataKursus->paket = $request->input('paket');
        $dataKursus->metode = $request->input('metode');
        $dataKursus->fasilitas = $request->input('fasilitas');
        $dataKursus->lokasi = $request->input('lokasi');

        // Handle single image upload
        if ($request->hasFile('img')) {
            $dataKursus->img = $request->file('img')->store('images', 'public');
        }

        // Handle multiple image uploads
        if ($request->hasFile('img_konten')) {
            $images = [];
            foreach ($request->file('img_konten') as $file) {
                $images[] = $file->store('images', 'public');
            }
            $dataKursus->img_konten = json_encode($images);
        }

        // Save updated record
        $dataKursus->save();

        // Redirect with success message
        return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $dataKursus = DataKursus::findOrFail($id);
        $dataKursus->delete();
        return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil dihapus.');
    }
}
