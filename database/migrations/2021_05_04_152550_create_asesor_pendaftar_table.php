<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesorPendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesor_pendaftar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asesor_jenis_sertifikasi');
            $table->unsignedBigInteger('id_pendaftar');
            $table->string('hasil');
            // $table->timestamps();

            // $table->foreign('id_asesor_jenis_sertifikasi')->references('id')->on('asesor_jenis_sertifikasi')->onDelete('cascade');
            // $table->foreign('id_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesor_pendaftar');
    }
}
