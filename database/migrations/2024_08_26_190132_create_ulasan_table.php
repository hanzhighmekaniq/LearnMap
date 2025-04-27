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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('rating')->unsigned(); // Rating 1-5
            $table->text('comment')->nullable();
            $table->timestamps();

            // Foreign key constraint untuk kursus_id
            $table->foreignId('kursus_id')
                ->nullable() // Membuat kolom ini bisa NULL
                ->constrained('data_kursus') // Mengarah ke tabel kursus, bukan kategori
                ->onDelete('cascade') // Aturan saat data dihapus, akan menghapus ulasan terkait
                ->onUpdate('cascade'); // Aturan saat data diupdate

            // Foreign key constraint untuk user_id
            $table->foreignId('user_id')
                ->nullable() // Membuat kolom ini bisa NULL
                ->constrained('users') // Nama tabel yang dijadikan referensi
                ->onDelete('cascade') // Aturan saat data dihapus, akan menghapus ulasan terkait
                ->onUpdate('cascade'); // Aturan saat data diupdate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
