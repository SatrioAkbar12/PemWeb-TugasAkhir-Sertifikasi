<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaranSertifikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran_sertifikasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ref_jenis_sertifikasi');
            $table->text('deskripsi_penawaran');
            $table->string('periode');
            $table->timestamps();
            $table->string('created_by');
            $table->string('edited_by');
            $table->boolean('is_aktif');

            $table->foreign('id_ref_jenis_sertifikasi')->references('id')->on('ref_jenis_sertifikasi')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawaran_sertifikasi');
    }
}
