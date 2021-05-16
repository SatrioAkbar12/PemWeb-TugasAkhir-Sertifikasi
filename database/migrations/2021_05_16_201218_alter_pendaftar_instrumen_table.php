<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPendaftarInstrumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_instrumen', function (Blueprint $table) {
            $table->foreign('id_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
            $table->foreign('id_instrumen_asesmen')->references('id')->on('instrumen_asesmen_kompetensi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar_instrumen');
    }
}
