<?php

namespace App\Http\Controllers;

use App\Models\DataKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DataKategori::query();

        // Cek apakah ada input pencarian
        if ($request->has('search') && !empty($request->search)) {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }

        // Ambil data dengan paginasi
        $kategori = $query->paginate(10);

        // Kirim data ke view
        return view('admin.dataKategoriAdmin', compact('kategori'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama_kategori' => 'required',  // Pastikan 'nama_kategori' yang divalidasi sesuai dengan input form
            ]);

            // Cek apakah validasi gagal
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Simpan data ke dalam database
            $result = DataKategori::create([
                'nama_kategori' => $request->nama_kategori,  // Menggunakan 'nama_kategori' sesuai dengan input
            ]);

            // Redirect setelah berhasil
            return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Ditambahkan']);
        } catch (\Exception $e) {
            // $e->getMessage()])
            return redirect()->route('kategori.index')->with(['error' => 'Data Sudah Ada']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /// Validasi request
        $request->validate([
            'nama_kategori' => 'required',
        ]);


        try {
            // Ambil record DataKursus berdasarkan ID-nya
            $dataKategori = DataKategori::findOrFail($id);

            // Update fields
            $dataKategori->nama_kategori = $request->input('nama_kategori');

            // Simpan perubahan
            $dataKategori->save();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('kategori.index')->with(['error' => 'Data Sudah Ada']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Temukan kategori berdasarkan ID
            $kategori = DataKategori::findOrFail($id);

            // Hapus kategori
            $kategori->delete();

            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Gagal menghapus kategori. untuk menghapus kategori tidak boleh ada kursus yang tersambung dengan kategori ');
        }
    }
}
