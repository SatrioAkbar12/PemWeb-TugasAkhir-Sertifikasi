<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsesorJenisSertifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asesor_jenis_sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asesor');
            $table->unsignedBigInteger('id_ref_jenis_sertifikasi');
            $table->date('tanggal_awal_berlaku');
            $table->date('tanggal_akhir_berlaku');
            $table->string('no_sertifikat');
            // $table->timestamps();

            // $table->foreign('id_asesor')->references('id')->on('asesor')->onDelete('cascade');
            // $table->foreign('id_ref_jenis_sertifikasi')->references('id')->on('ref_jenis_sertifikasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asesor_jenis_sertifikasi');
    }
}
