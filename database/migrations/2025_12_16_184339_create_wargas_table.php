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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id('warga_id');
            $table->string('no_ktp')->unique()->comment('Nomor KTP');
            $table->string('nama')->comment('Nama lengkap');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->comment('Jenis kelamin');
            $table->string('agama')->nullable()->comment('Agama');
            $table->string('pekerjaan')->nullable()->comment('Pekerjaan');
            $table->string('telp')->nullable()->comment('Nomor telepon');
            $table->string('email')->nullable()->unique()->comment('Email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
