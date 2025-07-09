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
        Schema::create('makanan', function (Blueprint $table) {
            $table->string('id_makanan', 10)->primary();
            $table->string('nama_makanan');
            $table->string('kategori');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('id_restoran', 10);
            $table->foreign('id_restoran')->references('id_restoran')->on('restoran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makanan');
    }
};
