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
        Schema::create('detail_karya_senis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('karya_seni_id');
            $table->text('renovasi');
            $table->date('tgl_renovasi');
            $table->string('lembaga_renovasi');
            $table->string('foto_sebelum');
            $table->string('foto_sesudah');
            $table->timestamps();

            $table->foreign('karya_seni_id')->references('id_karya_seni')->on('tbl_karya_senis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_karya_senis');
    }
};
