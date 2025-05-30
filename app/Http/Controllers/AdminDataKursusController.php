<?php

namespace App\Http\Controllers;

use Nette\Utils\Strings;
use App\Models\DataKategori;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\DataKursus; // Pastikan model diimport
use App\Models\User;

class AdminDataKursusController extends Controller
{

    public function dataKursus(Request $request)
    {
        $user = auth()->user();
        $query = DataKursus::with('kategoris');

        // Filter berdasarkan user_id jika bukan admin
        if ($user->role !== 'admin') {
            $query->where('user_id', $user->id);
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama_kursus', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori (jika dipilih)
        if ($request->has('role') && !empty($request->role)) {
            $query->whereHas('kategoris', function ($q) use ($request) {
                $q->where('nama_kategori', $request->role);
            });
        }

        $kategoriList = DataKategori::all();

        // Ambil data dengan paginasi
        $courses = $query->paginate(10);

        // Ambil gambar untuk setiap course
        foreach ($courses as $course) {
            $course->imageNames = $course->img_konten ? json_decode($course->img_konten, true) : [];
        }

        return view('admin.dataKursusAdmin', compact('courses', 'kategoriList'));
    }






    public function create()
    {
        $kategori = DataKategori::all();
        $users = User::where('role', 'user')->get();
        return view('admin.tambahDataKursusAdmin', compact('kategori', 'users'));
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'nama_kursus' => 'required',
                'kategori_id' => 'required',
                'img' => 'required|image',
                'deskripsi' => 'required',
                'paket' => 'required',
                'metode' => 'required',
                'lokasi' => 'required',
                'fasilitas' => 'required',
                'latitude' => 'required',
                'longitude' => 'required',
                'user_id' => 'required',
                'img_konten.*' => 'nullable|image',
            ], [
                'nama_kursus.required' => 'Nama kursus wajib diisi.',
                'kategori_id.required' => 'Kategori kursus wajib diisi.',
                'kategori_id.exists' => 'Kategori tidak valid.',
                'img.required' => 'Gambar utama wajib di-upload.',
                'img.image' => 'File yang di-upload harus berupa gambar.',
                'img.mimes' => 'Gambar harus berekstensi jpeg, png, atau jpg.',
                'img.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
                'paket.required' => 'Paket wajib diisi.',
                'metode.required' => 'Metode wajib diisi.',
                'lokasi.required' => 'Lokasi wajib diisi.',
                'fasilitas.required' => 'Fasilitas wajib diisi.',
                'latitude.required' => 'Latitude wajib diisi.',
                'longitude.required' => 'Longitude wajib diisi.',
                'user_id.required' => 'User wajib diisi.',
                'img_konten.*.image' => 'File konten harus berupa gambar.',
                'img_konten.*.mimes' => 'Gambar konten harus berekstensi jpeg, png, atau jpg.',
                'img_konten.*.max' => 'Ukuran gambar konten tidak boleh lebih dari 2MB.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Upload gambar utama
            $imgPath = $request->file('img')->store('konten', 'public');

            // Upload gambar konten (jika ada)
            $imgKontenPaths = [];
            if ($request->hasFile('img_konten')) {
                foreach ($request->file('img_konten') as $file) {
                    $imgKontenPaths[] = $file->store('logo', 'public');
                }
            }

            // Simpan ke database
            DataKursus::create([
                'nama_kursus' => $request->nama_kursus,
                'kategori_id' => $request->kategori_id,
                'img' => $imgPath,
                'deskripsi' => $request->deskripsi,
                'paket' => $request->paket,
                'metode' => $request->metode,
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'img_konten' => json_encode($imgKontenPaths),
                'user_id' => $request->user_id,
            ]);

            return redirect('admin/data-kursus')->with('success', 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    public function edit($id)
    {
        // Ambil data kategori
        $kategori = DataKategori::all();

        // Ambil data kursus berdasarkan ID
        $dataKursus = DataKursus::findOrFail($id);

        // Decode JSON fasilitas agar bisa ditampilkan dalam bentuk array
        $fasilitas = json_decode($dataKursus->fasilitas, true) ?? [];

        // Decode JSON untuk daftar gambar konten (jika ada)
        $imageName = $dataKursus->img_konten ? json_decode($dataKursus->img_konten, true) : [];

        // Kirim data ke view
        return view('admin.ubahDataKursusAdmin', compact('dataKursus', 'imageName', 'kategori', 'fasilitas'));
    }


    public function update(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_kursus' => 'required|string|max:255',
            'kategori_id' => 'required',
            'deskripsi' => 'required|string',
            'img' => 'nullable|image',
            'img_konten.*' => 'nullable|image',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'paket' => 'required|string',
            'metode' => 'required|string',
            'lokasi' => 'required|string',
        ], [
            'nama_kursus.required' => 'Nama kursus wajib diisi.',
            'kategori_id.required' => 'Kategori kursus wajib diisi.',
            'nama_kursus.max' => 'Nama kursus tidak boleh lebih dari 255 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'img.image' => 'File yang di-upload harus berupa gambar.',
            'latitude.required' => 'Latitude wajib diisi.',
            'latitude.numeric' => 'Latitude harus berupa angka.',
            'longitude.required' => 'Longitude wajib diisi.',
            'longitude.numeric' => 'Longitude harus berupa angka.',
            'paket.required' => 'Paket wajib diisi.',
            'metode.required' => 'Metode wajib diisi.',
            'lokasi.required' => 'Lokasi wajib diisi.',
        ]);

        try {
            // Gunakan transaksi database untuk memastikan data aman
            DB::beginTransaction();

            // Ambil record DataKursus berdasarkan ID-nya
            $dataKursus = DataKursus::findOrFail($id);

            // Update fields
            $dataKursus->update([
                'nama_kursus' => $request->input('nama_kursus'),
                'kategori_id' => $request->input('kategori_id'),
                'deskripsi' => $request->input('deskripsi'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'paket' => $request->input('paket'),
                'metode' => $request->input('metode'),
                'fasilitas' => json_encode($request->input('fasilitas')), // Simpan sebagai JSON
                'lokasi' => $request->input('lokasi'),
            ]);

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
                    $oldImages = json_decode($dataKursus->img_konten, true) ?? [];
                    foreach ($oldImages as $oldImage) {
                        Storage::delete('public/' . $oldImage);
                    }
                }

                $menuImages = [];
                foreach ($request->file('img_konten') as $file) {
                    $imgKontenPath = $file->store('logo', 'public');
                    $menuImages[] = $imgKontenPath;
                }
                $dataKursus->img_konten = json_encode($menuImages);
            }

            // Simpan perubahan
            $dataKursus->save();

            // Commit transaksi
            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            // Rollback jika terjadi error
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    public function destroy($id)
    {
        try {
            $dataKursus = DataKursus::findOrFail($id);
            $dataKursus->delete();

            return redirect()->route('admin.dataKursus')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('admin.dataKursus')->with('error', 'Gagal Menghapus Kursus, Periksa  ');
        }
    }
}
