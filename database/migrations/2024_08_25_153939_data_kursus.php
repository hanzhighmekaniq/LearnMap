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
            $table->id();
            $table->string('nama_kursus');
            $table->string('img')->nullable();
            $table->longText('deskripsi');
            $table->string('paket');
            $table->string('metode');
            $table->text('fasilitas');
            $table->string('lokasi');
            $table->decimal('latitude', 10, 8)->index(); // Increased precision
            $table->decimal('longitude', 11, 8)->index(); // Increased precision
            $table->json('img_konten')->nullable();
            $table->timestamps();
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
