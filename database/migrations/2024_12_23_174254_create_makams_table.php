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
        Schema::create('makams', function (Blueprint $table) {
            $table->id();
		    $table->string('Nama');
		    $table->string('Gelar');
		    $table->date('Tgl_Lahir');
		    $table->date('Tgl_Meninggal');
		    $table->char('Cluster');
            $table->string('media_path')->nullable(); // Kolom untuk menyimpan path/URL file media
            $table->string('Deskripsi')->nullable();
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makams');
    }
};
