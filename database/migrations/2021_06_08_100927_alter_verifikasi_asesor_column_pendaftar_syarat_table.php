<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVerifikasiAsesorColumnPendaftarSyaratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_syarat', function (Blueprint $table) {
            $table->boolean('verifikasi_asesor')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pendaftar_syarat', function (Blueprint $table) {
            $table->string('verifikasi_asesor')->change();
        });
    }
}
