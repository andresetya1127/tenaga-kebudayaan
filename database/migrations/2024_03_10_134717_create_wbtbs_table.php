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
        Schema::create('wbtbs', function (Blueprint $table) {
            $table->uuid('id_wbtb')->primary();
            $table->string('kode', 30)->unique()->nullable();
            $table->string('nama_warisan', 200)->nullable();
            $table->string('tingkatan_data', 150)->nullable();
            $table->date('tgl_pendataan')->nullable();
            $table->date('tgl_verifikasi')->nullable();
            $table->date('tgl_penetapan')->nullable();
            $table->string('provinsi', 20)->nullable();
            $table->string('sebaran_kabupaten', 20)->nullable();
            $table->text('entitas_kebudayaan')->nullable();
            $table->text('domain_wbtb')->nullable();
            $table->text('kategori_wbtb')->nullable();
            $table->text('nama_objek')->nullable();
            $table->text('wilayah_level')->nullable();
            $table->text('kondisi_sekarang')->nullable();
            $table->text('kabupaten')->nullable();
            $table->date('tgl_penerimaan')->nullable();
            $table->text('tempat_penerimaan')->nullable();
            $table->string('nama_petugas', 200)->nullable();
            $table->string('nama_lembaga', 200)->nullable();
            $table->string('nama_sdm', 200)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->text('youtube')->nullable();
            $table->text('dokumen')->nullable();
            $table->integer('status', false, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wbtbs');
    }
};
