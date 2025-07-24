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
    Schema::create('sewa', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
        $table->foreignId('mobil_id')->constrained('mobil')->onDelete('cascade');
        $table->date('tanggal_mulai');
        $table->date('tanggal_selesai');
        $table->string('foto_ktp');
        $table->string('foto_sim');
        $table->string('no_hp');
        $table->string('sosial_media'); 
        $table->enum('status', ['pending', 'diterima', 'ditolak','selesai'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sewa');
    }
};
