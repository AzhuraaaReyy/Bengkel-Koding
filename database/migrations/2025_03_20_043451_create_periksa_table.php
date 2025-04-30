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
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            $table->foreignID('id_pasien')->constrained('users', 'id');
            $table->foreignID('id_dokter')->constrained('users', 'id');
            $table->datetime('tgl_periksa')->nullable();
            $table->text('catatan')->nullable();
            $table->float('totalHarga')->nullable();
            $table->float('biaya_periksa')->nullable();
            $table->string('status')->default('Menunggu'); // default bisa Menunggu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksas');
    }
};
