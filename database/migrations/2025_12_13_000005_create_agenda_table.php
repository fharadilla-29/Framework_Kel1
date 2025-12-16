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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('agenda_id');
            $table->string('judul', 255);
            $table->string('lokasi', 255);
            $table->datetime('tanggal_mulai');
            $table->datetime('tanggal_selesai');
            $table->string('penyelenggara', 150);
            $table->text('deskripsi')->nullable();
            $table->string('poster', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};

