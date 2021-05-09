<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penawaran_sertifikasi');
            $table->unsignedBigInteger('id_kegiatan');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->timestamp('created_at');
            $table->string('created_by');
            $table->boolean('is_show');
            $table->text('deskripsi');

            // $table->foreign('id_penawaran_sertifikasi')->references('id')->on('penawaran_sertifikasi')->onDelete('cascade');
            // $table->foreign('id_kegiatan')->references('id')->on('ref_kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}
