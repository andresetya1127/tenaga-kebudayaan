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
        Schema::create('detail_odcbs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('odcb_id');
            $table->text('renovasi');
            $table->date('tgl_renovasi');
            $table->string('lembaga_renovasi');
            $table->string('foto_sebelum');
            $table->string('foto_sesudah');
            $table->timestamps();

            $table->foreign('odcb_id')->references('id_odcb')->on('tbl_odcbs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_odcbs');
    }
};
