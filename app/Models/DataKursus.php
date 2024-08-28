<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKursus extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model ini
    protected $table = 'data_kursus';

    // Jika Anda menggunakan timestamp di tabel
    public $timestamps = true;
}
