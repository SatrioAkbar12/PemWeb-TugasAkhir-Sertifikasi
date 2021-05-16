<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPendaftarSyaratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_syarat', function (Blueprint $table) {
            $table->foreign('id_syarat_sertifikasi')->references('id')->on('syarat_sertifikasi')->onDelete('cascade');
            $table->foreign('id_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar_syarat');
    }
}
