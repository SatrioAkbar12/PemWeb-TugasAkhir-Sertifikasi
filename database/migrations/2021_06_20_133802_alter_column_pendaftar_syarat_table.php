<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnPendaftarSyaratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pendaftar_syarat', function (Blueprint $table) {
            $table->string('verifikasi_asesor')->nullable()->change();
            $table->string('komentar_asesor')->nullable()->change();
            $table->string('verified_by')->nullable()->change();
            $table->timestamp('verified_at')->nullable()->change();
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
            $table->string('komentar_asesor')->change();
            $table->string('verified_by')->change();
            $table->timestamp('verified_at')->change();
        });
    }
}
