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
        $courses = DataKursus::paginate(10);

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
            $validator = Validator::make($request->all(), [
                'nama_kursus' => 'required',
                'img' => 'required|file|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'required',
                'paket' => 'required',
                'metode' => 'required',
                'fasilitas' => 'required',
                'lokasi' => 'required',
                'latitude' => 'required', // Ubah menjadi wajib diisi
                'longitude' => 'required', // Ubah menjadi wajib diisi
                'popular' => 'required',
                'img_konten.*' => 'nullable|file', // Gambar konten tetap opsional
            ], [
                'nama_kursus.required' => 'Nama kursus wajib diisi.',
                'img.required' => 'Gambar utama wajib di-upload.',
                'img.file' => 'File yang di-upload harus berupa gambar.',
                'img.mimes' => 'Gambar harus berekstensi jpeg, png, atau jpg.',
                'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
                'paket.required' => 'Paket wajib diisi.',
                'metode.required' => 'Metode wajib diisi.',
                'fasilitas.required' => 'Fasilitas wajib diisi.',
                'lokasi.required' => 'Lokasi wajib diisi.',
                'latitude.required' => 'Latitude wajib diisi.', // Pesan error custom
                'longitude.required' => 'Longitude wajib diisi.', // Pesan error custom
                'popular.required' => 'Status popular wajib diisi.',
                'img_konten.*.nullable' => 'Gambar konten bersifat opsional.',
                'img_konten.*.file' => 'File yang di-upload harus berupa gambar.',
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
        // Validasi request
        $request->validate([
            'nama_kursus' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'img_konten.*' => 'nullable|image|max:2048',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'popular' => 'required|string',
            'paket' => 'required|string',
            'metode' => 'required|string',
            'fasilitas' => 'required|string',
            'lokasi' => 'required|string',
        ], [
            'nama_kursus.required' => 'Nama kursus wajib diisi.',
            'nama_kursus.max' => 'Nama kursus tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'img.image' => 'File yang di-upload harus berupa gambar.',
            'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'latitude.required' => 'Latitude wajib diisi.',
            'latitude.numeric' => 'Latitude harus berupa angka.',
            'longitude.required' => 'Longitude wajib diisi.',
            'longitude.numeric' => 'Longitude harus berupa angka.',
            'popular.required' => 'Status popular wajib diisi.',
            'paket.required' => 'Paket wajib diisi.',
            'metode.required' => 'Metode wajib diisi.',
            'fasilitas.required' => 'Fasilitas wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]);


        try {
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

            // Update gambar utama jika ada file baru
            if ($request->hasFile('img')) {
                if ($dataKursus->img) {
                    // Hapus file lama
                    Storage::delete('public/' . $dataKursus->img);
                }
                // Simpan gambar baru
                $imgPath = $request->file('img')->store('konten', 'public');
                $dataKursus->img = $imgPath;
            }

            // Update multiple file upload jika ada file baru
            if ($request->hasFile('img_konten')) {
                if ($dataKursus->img_konten) {
                    $oldImages = json_decode($dataKursus->img_konten, true);
                    foreach ($oldImages as $oldImage) {
                        Storage::delete('public/' . $oldImage);
                    }
                }

                $menuImages = [];
                foreach ($request->file('img_konten') as $file) {
                    $imgKontenPaths = $file->store('logo', 'public');
                    $menuImages[] = $imgKontenPaths;
                }
                $dataKursus->img_konten = json_encode($menuImages);
            }

            // Simpan perubahan
            $dataKursus->save();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangani error dan kirimkan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    public function destroy($id)
    {
        $dataKursus = DataKursus::findOrFail($id);
        $dataKursus->delete();
        return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil dihapus.');
    }
}
