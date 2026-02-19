<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('templates', function (Blueprint $table) {
        $table->id();
        $table->string('nama_template');
        $table->string('kategori'); // Misal: Minimalist, IT Student, Creative
        $table->string('foto_preview'); // Nama file gambar
        $table->string('link_demo')->nullable(); // Link ke hasil web
        $table->string('link_github')->nullable(); // Link download code
        $table->text('deskripsi');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
