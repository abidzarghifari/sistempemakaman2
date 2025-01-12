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
        Schema::create('makamkoordinates', function (Blueprint $table) {
            $table->id();
            $table->char('Cluster');	
	        $table->foreignId('id_makam')->constrained('makams')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makamkoordinates');
    }
};
