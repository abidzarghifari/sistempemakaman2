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
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->decimal('Pemasukan')->nullable();
            $table->decimal('Pengeluaran')->nullable();
            $table->decimal('Jumlah');
            $table->string('Donatur')->nullable();
            $table->string('Keterangan')->nullable();
            $table->timestamps('tanggaltransaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas');
    }
};
