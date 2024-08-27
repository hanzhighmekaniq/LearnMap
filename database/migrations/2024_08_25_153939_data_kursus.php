<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_kursus', function (Blueprint $table) {
            $table->id(); // Kolom id dengan auto increment
            $table->string('nama_kursus'); // Kolom nama_kursus
            $table->string('img')->nullable(); // Kolom img (nullable jika tidak wajib diisi)
            $table->text('deskripsi'); // Kolom deskripsi
            $table->string('paket'); // Kolom paket
            $table->string('metode'); // Kolom metode
            $table->text('fasilitas'); // Kolom fasilitas
            $table->string('lokasi'); // Kolom lokasi
            $table->decimal('latitude', 10, 7); // Kolom latitude (10 digit, 7 desimal)
            $table->decimal('longitude', 10, 7); // Kolom longitude (10 digit, 7 desimal)
            $table->timestamps(); // Kolom createbed_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kursus');
    }
};
