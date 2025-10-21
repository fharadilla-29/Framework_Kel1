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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profil_id')->unique()->after('id');
            $table->string('nama_desa')->after('profil_id');
            $table->string('kecamatan')->after('nama_desa');
            $table->string('kabupaten')->after('kecamatan');
            $table->string('provinsi')->after('kabupaten');
            $table->text('alamat_kantor')->after('provinsi');
            $table->string('telepon')->after('alamat_kantor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'profil_id',
                'nama_desa',
                'kecamatan',
                'kabupaten',
                'provinsi',
                'alamat_kantor',
                'telepon'
            ]);
        });
    }
};
