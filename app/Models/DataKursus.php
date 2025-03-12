<?php

namespace App\Models;

use App\Models\Kunjungan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKursus extends Model
{
    use HasFactory;

    protected $table = 'data_kursus';

    protected $fillable = [
        'kategori_id',
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

    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(DataKategori::class, 'kategori_id', 'id'); // Menentukan foreign key dan local key
    }
    
    public function kunjungan(): HasMany
    {
        return $this->hasMany(Kunjungan::class, 'kursus_id', 'id'); // Menentukan foreign key dan local key
    }

    public function ulasan(): HasMany
    {
        return $this->hasMany(DataUlasan::class, 'kursus_id', 'id'); // Menentukan foreign key dan local key
    }
}
