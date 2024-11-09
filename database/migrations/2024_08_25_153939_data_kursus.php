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
            $table->longText('paket');
            $table->longText('metode');
            $table->text('fasilitas');
            $table->longText('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('popular');
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
