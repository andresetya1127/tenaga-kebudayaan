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
        Schema::create('tbl_dasar_hukums', function (Blueprint $table) {
            $table->uuid('id_dasar_hukum');
            $table->string('nama_dasar_hukum')->unique();
            $table->text('link_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_dasar_hukums');
    }
};
