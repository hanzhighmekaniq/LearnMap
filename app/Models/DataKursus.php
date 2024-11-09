<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKursus extends Model
{
    use HasFactory;

    protected $table = 'data_kursus';

    protected $fillable = [
        'nama_kursus',
        'img',
        'deskripsi',
        'paket',
        'metode',
        'fasilitas',
        'lokasi',
        'latitude',
        'longitude', // Pastikan nama kolom sesuai dengan migrasi
        'popular', // Pastikan nama kolom sesuai dengan migrasi
        'img_konten'
    ];

    public $timestamps = true;
}
