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
        Schema::create('tbl_beritas', function (Blueprint $table) {
            $table->uuid('id_berita')->primary();
            $table->text('title');
            $table->text('content');
            $table->text('tag')->nullable();
            $table->string('name', 200);
            $table->integer('views', false)->default(0);
            $table->string('image')->default('default.png');
            $table->date('tgl_upload');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_beritas');
    }
};
