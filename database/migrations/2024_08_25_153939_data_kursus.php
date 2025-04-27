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
            $table->longText('lokasi');
            $table->json('fasilitas')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->json('img_konten')->nullable();
            $table->timestamps();

            $table->foreignId('user_id')
                ->nullable() // Membuat kolom ini bisa NULL
                ->constrained('users') // Nama tabel yang dijadikan referensi
                ->onDelete('restrict') // Aturan saat data dihapus
                ->onUpdate('cascade'); // Aturan saat data diupdate
            $table->foreignId('kategori_id')
                ->nullable() // Membuat kolom ini bisa NULL
                ->constrained('kategori') // Nama tabel yang dijadikan referensi
                ->onDelete('restrict') // Aturan saat data dihapus
                ->onUpdate('cascade'); // Aturan saat data diupdate
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
