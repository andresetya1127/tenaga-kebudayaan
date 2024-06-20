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
        Schema::create('tbl_detail_cagar_budayas', function (Blueprint $table) {
            $table->uuid('id_detail_cagar')->primary();
            $table->string('kategori_objek', 150);
            $table->string('nama_objek', 150);
            $table->string('keberadaan_objek', 150);
            $table->string('lokasi_penyimpanan', 100);
            $table->text('koordinat');
            $table->string('ukuran', 50);
            $table->string('bahan_utama', 150);
            $table->string('batas_lain', 50);
            $table->string('kondisi', 50);
            $table->string('nama_pemilik', 150);
            $table->text('alamat');
            $table->text('riwayat');
            $table->text('latar_sejarah');
            $table->text('deskripsi');

            $table->foreignUuid('id_cagar_budaya');
            $table->foreign('id_cagar_budaya')
                ->references('id_cagar_budaya')
                ->on('tbl_cagar_budayas')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_detail_cagar_budayas');
    }
};
