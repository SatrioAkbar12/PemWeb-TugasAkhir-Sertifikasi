<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarInstrumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_instrumen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftar');
            $table->unsignedBigInteger('id_instrumen_asesmen');
            $table->text('jawaban_self_asesmen');
            $table->string('path_bukti');
            $table->text('komentar_bukti');
            $table->text('jawaban_asesor_verifikasi');
            $table->string('verified_by');
            $table->timestamp('verified_at');
            $table->string('created_by');
            $table->string('edited_by');
            $table->timestamps();

            // $table->foreign('id_pendaftar')->references('id')->on('pendaftar')->onDelete('cascade');
            // $table->foreign('id_instrumen_asesmen')->references('id')->on('instrumen_asesmen_kompetensi')->onDelete('cascade');
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
