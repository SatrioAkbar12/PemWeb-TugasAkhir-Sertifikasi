<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaSertifikasiColumnPenawaranSertifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penawaran_sertifikasi', function (Blueprint $table) {
            $table->string('nama');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penawaran_sertifikasi', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }
}
