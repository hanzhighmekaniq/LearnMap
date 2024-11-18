<?php

namespace App\Http\Controllers;

use Nette\Utils\Strings;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\DataKursus; // Pastikan model diimport

class AdminDataKursusController extends Controller
{

    // ADMIN FADIAS TUKANG SERVER
    public function dataKursus()
    {
        // Mengambil semua data kursus dari model DataKursus
        $courses = DataKursus::paginate(5);

        // Mengambil gambar untuk setiap course, jika ada
        foreach ($courses as $course) {
            $course->imageNames = $course->img_konten ? json_decode($course->img_konten, true) : [];
        }

        // Mengirim data courses dengan gambar ke view
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
                'popular' => 'required', // Ubah aturan validasi
                'img_konten.*' => 'required|file|mimes:jpeg,png,jpg|max:2048',
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
                'popular' => $request->popular, // Menyimpan nilai longitude bebas
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
        try {
            $request->validate([
                'nama_kursus' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'img' => 'nullable|image|max:2048',
                'img_konten.*' => 'nullable|image|max:2048',
                'latitude' => 'required|numeric',
                'longitude' => 'nullable|numeric',
                'popular' => 'required|string',
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
            $dataKursus->popular = $request->input('popular');
            $dataKursus->paket = $request->input('paket');
            $dataKursus->metode = $request->input('metode');
            $dataKursus->fasilitas = $request->input('fasilitas');
            $dataKursus->lokasi = $request->input('lokasi');


            if ($request->hasFile('img')) {
                // Hapus gambar lama jika ada
                if ($dataKursus->img) {
                    Storage::delete('public/' . $dataKursus->img);
                }


                // Simpan gambar baru
                $imgPath = $request->file('img')->store('konten', 'public');
                $dataKursus->img = $imgPath;
            }


            if ($request->hasFile('img_konten')) {
                // Hapus gambar menu lama jika ada
                if ($dataKursus->img_konten) {
                    // Decode JSON untuk mendapatkan array path dari gambar lama
                    $oldImages = json_decode($dataKursus->img_konten, true);
                    foreach ($oldImages as $oldImage) {
                        // Hapus setiap file lama dari penyimpanan
                        Storage::delete('public/' . $oldImage);
                    }
                }

                // Proses setiap file yang di-upload untuk gambar menu baru
                $menuImages = [];
                foreach ($request->file('img_konten') as $file) {
                    // Simpan file di folder 'images/kuliner/detail' dalam disk 'public'
                    $imgKontenPaths = $file->store('logo', 'public');
                    // Menambahkan path ke array baru
                    $menuImages[] = $imgKontenPaths;
                }

                // Simpan array path gambar menu baru ke database
                $dataKursus->img_konten = json_encode($menuImages);
            }

            // Save updated record
            $dataKursus->save();

            // Redirect with success message
            return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        // Validasi request

    }


    public function destroy($id)
    {
        $dataKursus = DataKursus::findOrFail($id);
        $dataKursus->delete();
        return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil dihapus.');
    }
}
