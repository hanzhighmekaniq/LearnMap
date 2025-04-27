<?php

namespace App\Models;

use App\Models\DataKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUlasan extends Model
{
    use HasFactory;
    protected $table = 'ulasan';
    protected $fillable = [
        'kursus_id',
        'rating',
        'comment',
        'user_id'

    ];
    public $timestamps = true;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Menentukan foreign key dan local key
    }
}
