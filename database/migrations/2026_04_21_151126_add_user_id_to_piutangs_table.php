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
        Schema::table('piutangs', function (Blueprint $table) {
            // tambah kolom user_id + relasi ke tabel users
            $table->foreignId('user_id')
                  ->nullable()
                  ->after('id')
                  ->constrained()
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('piutangs', function (Blueprint $table) {
            // hapus foreign key dulu
            $table->dropForeign(['user_id']);

            // lalu hapus kolomnya
            $table->dropColumn('user_id');
        });
    }
};