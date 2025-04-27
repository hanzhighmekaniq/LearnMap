<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'nama_kategori'
    ];
    public $timestamps = true;

    // Relasi dengan DataWisata
    public function kursus(): HasMany
    {
        return $this->hasMany(DataKursus::class, 'kategori_id', 'id'); // Menentukan foreign key dan local key
    }
}
