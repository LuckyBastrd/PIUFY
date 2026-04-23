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
        Schema::create('piutangs', function (Blueprint $table) {
            $table->id();
            $table->string('no_tagihan');
            $table->string('nama_klien');
            $table->string('nama_proyek');
            $table->string('termin');
            $table->decimal('nilai_tagihan', 15, 2);
            $table->string('metode_pembayaran');
            $table->date('tanggal_terbit');
            $table->date('tanggal_jatuh_tempo');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piutangs');
    }
};
