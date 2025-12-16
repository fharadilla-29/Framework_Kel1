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
        Schema::create('berita', function (Blueprint $table) {
            $table->id('berita_id');
            $table->unsignedBigInteger('kategori_id');
            $table->string('judul', 255);
            $table->string('slug', 255)->unique();
            $table->longText('isi_html');
            $table->string('penulis', 100);
            $table->enum('status', ['draft', 'terbit', 'arsip'])->default('draft');
            $table->timestamp('terbit_at')->nullable();
            $table->string('cover', 500)->nullable();
            $table->timestamps();

            $table->foreign('kategori_id')
                ->references('kategori_id')
                ->on('kategori_berita')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};

