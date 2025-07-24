<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('mobil', function (Blueprint $table) {
        $table->id();
        $table->string('nama_mobil');
        $table->string('plat_nomor')->unique();
        $table->integer('tahun');
        $table->string('tipe'); 
        $table->string('gambar')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
