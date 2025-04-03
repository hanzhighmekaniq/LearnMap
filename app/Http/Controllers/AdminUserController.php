<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->get('role'); // Ambil filter role
        $search = $request->get('search'); // Ambil input search

        $user = User::when($role, function ($query, $role) {
            return $query->where('role', $role); // Filter berdasarkan role jika ada
        })
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}"); // Cari berdasarkan nama atau email
                });
            })
            ->whereIn('role', ['user', 'pengunjung']) // Pastikan hanya user & pengunjung
            ->paginate(10);

        return view('admin.user.index', compact('user'));
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
            // Validasi data yang masuk
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'verif_password' => 'required|same:password',
            ]);

            // Simpan user baru ke database
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']), // Hash password untuk keamanan
                'role' => 'user', // Default role untuk user baru
            ]);

            return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Simpan error ke log untuk debugging
            return redirect()->route('user.index')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required'
        ]);
        try {
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            $user->save();
            return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Error:' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari user berdasarkan ID
            $user = User::findOrFail($id);

            // Hapus user dari database
            $user->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
