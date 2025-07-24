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
        Schema::table('mobil', function (Blueprint $table) {
            $table->string('kapasitas_bbm')->nullable()->after('nama_mobil'); // ubah posisi sesuai kebutuhan
            $table->string('transmisi')->nullable()->after('kapasitas_bbm');
            $table->string('jumlah_penumpang')->nullable()->after('transmisi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mobil', function (Blueprint $table) {
            $table->dropColumn([
                'kapasitas_bbm',
                'transmisi',
                'jumlah_penumpang',
            ]);
        });
    }
};
