<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';
    protected $fillable = ['device_id', 'kursus_id'];

    // Relasi ke Kursus
    public function kursuses(): BelongsTo
    {
        return $this->belongsTo(DataKursus::class, 'kursus_id', 'id');
    }
}
