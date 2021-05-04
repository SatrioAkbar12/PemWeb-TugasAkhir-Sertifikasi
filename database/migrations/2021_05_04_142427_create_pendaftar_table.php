<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_penawaran_sertifikasi');
            $table->bigInteger('id_asesi');
            $table->string('status_akhir_sertifikasi');
            $table->date('tanggal_status_akhir');
            $table->timestamps();
            $table->string('created_by');
            $table->string('edited_by');
            $table->string('status_pendaftaran');

            $table->foreign('id_penawaran_sertifikasi')->references('id')->on('penawaran_sertifikasi')->onDelete('cascade');
            $table->foreign('id_asesi')->references('id')->on('asesi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftar');
    }
}
