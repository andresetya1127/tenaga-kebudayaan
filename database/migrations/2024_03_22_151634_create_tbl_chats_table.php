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
        Schema::create('tbl_chats', function (Blueprint $table) {
            $table->uuid('chat_id')->primary();
            $table->integer('sender_id', false, 5);
            $table->integer('receive_id', false, 5);
            $table->text('message', false, 5);
            $table->text('file')->nullable();
            $table->integer('read_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_chats');
    }
};
