<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiPembayaranToSewaTable extends Migration
{
    public function up()
    {
        Schema::table('sewa', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable()->after('status');
        });
    }

    public function down()
    {
        Schema::table('sewa', function (Blueprint $table) {
            $table->dropColumn('bukti_pembayaran');
        });
    }
}

