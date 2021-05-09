<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarSyaratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_syarat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_syarat_sertifikasi');
            $table->unsignedBigInteger('id_pendaftar');
            $table->string('status_verifikasi_syarat');
            $table->string('path_bukti');
            $table->string('verifikasi_asesor');
            $table->text('komentar_asesor');
            $table->string('verified_by');
            $table->timestamp('verified_at');
            $table->string('created_by');
            $table->string('edited_by');
            $table->timestamps();

            // $table->foreign('id_syarat_sertifikasi')->references('id')->on('syarat_sertifikasi')->onDelete('cascade');
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
        Schema::dropIfExists('pendaftar_syarat');
    }
}
