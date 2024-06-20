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
        Schema::create('tbl_lembaga_komunitas', function (Blueprint $table) {
            $table->uuid('id_lembaga')->primary();
            $table->integer('kabupaten', false, 5);
            $table->string('nama_lembaga', 150);
            $table->string('jenis_lembaga', 150); // ada opsi
            $table->string('nama_ketua', 150);
            $table->string('no_ketua', 20);
            $table->char('nik_ketua', 16);
            $table->date('tgl_pendirian');
            $table->char('akte_pendirian', 16)->nullable();
            $table->char('npwp', 16)->nullable();
            $table->text('alamat_sekretariat');
            $table->string('email', 150);
            $table->string('facebook', 150);
            $table->string('instagram', 150);
            $table->string('youtube');
            $table->integer('jumlah_anggota', false, 5);
            $table->text('susunan_pengurus');
            $table->text('uraian_aktivitas');
            $table->text('dokumen')->nullable();
            $table->string('foto')->nullable();
            $table->text('video')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lembaga_komunitas');
    }
};
