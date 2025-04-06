<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\DataKursus;
use App\Models\DataKategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Salma Admin',
        //     'email' => 'salma@gmail.com',
        //     'username' => 'salma',
        //     'password' => bcrypt('salma281103'), // Ganti dengan password pilihan Anda
        //     'role' => 'admin',
        // ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin123'), // Ganti dengan password pilihan Anda
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'password' => bcrypt('user123'), // Ganti dengan password pilihan Anda
            'role' => 'user',
        ]);
        User::create([
            'name' => 'pengunjung',
            'username' => 'pengunjung',
            'email' => 'pengunjung@gmail.com',
            'password' => bcrypt('pengunjung123'), // Ganti dengan password pilihan Anda
            'role' => 'pengunjung',
        ]);
        // DataKategori::insert([
        //     ['nama_kategori' => 'Speaking'],
        //     ['nama_kategori' => 'Reading'],
        //     ['nama_kategori' => 'Good Looking'],
        //     ['nama_kategori' => 'Good Evening'],
        // ]);

        // // // Buat 3 kategori, setiap kategori memiliki banyak kursus
        // // // Buat 3 kategori
        // $kategoris = DataKategori::factory(3)->create();

        // // Buat kursus hingga total 20 data
        // $totalKursus = 20;
        // $kategoris->each(function ($kategori) use ($totalKursus, $kategoris) {
        //     $jumlahKursusPerKategori = floor($totalKursus / $kategoris->count());
        //     DataKursus::factory($jumlahKursusPerKategori)->create([
        //         'kategori_id' => $kategori->id,
        //     ]);
        // });

        // // Jika ada sisa karena pembagian tidak rata, tambahkan ke kategori pertama
        // $sisa = $totalKursus % $kategoris->count();
        // if ($sisa > 0) {
        //     DataKursus::factory($sisa)->create([
        //         'kategori_id' => $kategoris->first()->id,
        //     ]);
        // }
    }
}
